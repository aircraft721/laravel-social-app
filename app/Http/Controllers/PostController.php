<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDashboard(){

        $posts = Post::orderBy('created_at','desc')->get();

        return view('dashboard')->withPosts($posts);
    }



    public function postCreatePost(Request $request){

        $this->validate($request,[
           'body'=>'required|max:1000'

        ]);
        //validation
        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error';
        if($request->user()->posts()->save($post)){
            $message='Post succesfully created!';
        }
        return redirect()->route('dashboard')->with(['message'=>$message]);
    }

    public function getDeletePost($post_id){

        $post = Post::whereId($post_id)->first();
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message'=>'Successfully deleted']);

    }

    public function postEditPost(Request $request){
        $this->validate($request,[
           'body'=>'required'
        ]);
        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body'=>$post->body], 200);
    }


}
