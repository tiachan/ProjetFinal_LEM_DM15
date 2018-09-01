<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{

	protected $paginate = 2;


	public function index(){

        $posts = \App\Post::paginate($this->paginate); // pagination 
                $picture = \App\Picture::get();


        return view('front.index', ['posts' => $posts, 'picture' => $picture]);

    }

    public function showResearch(Request $request){

        $query = $request->search;

        $posts = \App\Post::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orWhere('post_type', 'LIKE', '%' . $query . '%')
            ->paginate(5);

        return view('front.search', ['posts' => $posts]); 

    }

    public function show(int $id){

        $post = \App\Post::find($id);
        $picture = \App\Picture::find($id);

        return view('front.show', ['post' => $post, 'picture' => $picture]);
    }

        public function contact()
    {
        return view('front.contact');
    }

}