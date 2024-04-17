<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'comment' => $validatedData['comment'],
        ];

        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->to('your-email@example.com')->subject('Contact Form Submission');
            $message->from($data['email'], $data['name']);
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
    


}