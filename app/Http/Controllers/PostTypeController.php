<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostTypeController extends Controller
{
    public function show($post_type){

    	  // vous ne récupérez qu'un seul poste 
        $posts = Post::where('post_type',$post_type)->get();

        // dd($post);

        // que vous passez à la vue
        return view('front.posttype', ['posts' => $posts]);
    }
}