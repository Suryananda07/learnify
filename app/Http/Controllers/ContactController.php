<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContact(){
        return view('contact');
    }

    public function Contact(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required'
        ], [
            'username.max' => 'username harus kurang dari 50 huruf'
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return redirect(route('contact'));
    }
}
