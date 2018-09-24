<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

        public function showBackResearch(Request $request){

        $query = $request->search;

        $posts = \App\Post::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orWhere('post_type', 'LIKE', '%' . $query . '%')
            ->paginate(5);

        return view('back.post.search', ['posts' => $posts]); 

    }
}
