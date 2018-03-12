<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']); // must be signed in to create a post
    }
    
    public function index() 
    {

        $posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->get();

        // Temporary.

        $archive = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();

        return view('posts.index', compact('posts', 'archive'));
    
    }

    public function show(Post $post) 
    {

        return view('posts.show', compact('post'));
    
    }

    public function create() 
    {

        return view('posts.create');
    
    }

    public function store() 
    {
        //dd(request(['title', 'body']));
        // Create a new post using the request data

        //$post = new Post;

        // $post->title = request('title');
        // $post->body = request('body');

        // // Save it to the database

        // $post->save();

        // Does all the same funcationality as code commented above
        // Post::create([

        //     'title' => request('title'),

        //     'body' => request('body')

        // ]);


        // Form validation
        $this->validate(request(), [
            'title' => 'required', // can include more validation requirements such as max length, type, etc.
            'body' => 'required'
        ]);


        auth()->user()->publish(

            new Post(request(['title', 'body']))
        
        );

        // Best practice
        // Post::create([

        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
            
        // ]);

        // And then redirect to the home page

        return redirect('/');
    
    }
}
