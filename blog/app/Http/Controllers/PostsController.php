<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index(){

        $posts = Post::latest()->get();


        return view( 'posts.index', compact('posts') );

    }

    public function show(Post $post){

        return view('posts.show', compact('post'));

    }

    public function create(){
        return view('posts.create');
    }


    public function store(){

        // create a new post using request data
        //save it to the db
        //redirect to home page

        $this->validate(request(),[
            'title' => 'required',
            'body' =>  'required'
        ]);

        Post::create(\request(['title','body']));
        return redirect('/');

    }
}
