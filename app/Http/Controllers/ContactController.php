<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact()
    {
        return view('front.contact');
    }

    public function store(ContactRequest $request)
    {
    	$message = Message::create($request->only('email', 'description'));
    	
    	Mail::to('admin@admin.fr')->send(new ContactMessageCreated($message));

		flashy('Nous vous répondrons dans les plus brefs délais.');

		return redirect()-> route('index');

	    }
}
