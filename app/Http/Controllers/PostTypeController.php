<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostTypeController extends Controller
{
    public function show($post_types){
    	return \App\Post::find($post_types);
    }
}