<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function getDashboard(){

        $posts = Post::all();

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
        $post->delete();
        return redirect()->route('dashboard')->with(['message'=>'Successfully deleted']);

    }
}
