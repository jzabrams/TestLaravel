<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;
use Carbon\carbon;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts){

        $posts = $posts->all();

        $posts = Post::latest()
            ->filter(request(['month', 'year]']))
            ->get();


        $archives = Post::archives();

        //return $archives;

        return view( 'posts.index', compact('posts', 'archives') );

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

        auth()->user()->publish(new Post(

            \request(['title', 'body']))

        );

        return redirect('/');

    }
}
