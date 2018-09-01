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

    public function show(int $id){

        // vous ne récupérez qu'un seul livre 
        $post = \App\Post::find($id);
        $picture = \App\Picture::find($id);

        // que vous passez à la vue
        return view('front.show', ['post' => $post, 'picture' => $picture]);
    }

}