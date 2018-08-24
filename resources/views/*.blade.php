<?php 

public function index(){
	$books = Book::all();
	return view('front.index',['books'=>$books])
}