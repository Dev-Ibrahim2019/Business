<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send the email
        Mail::to('i@alashqar.com')->send(new ContactUs($validatedData));

        return redirect()->back()->with([
            'message' => 'Thanks for contacting us!',
            'type' => 'info',
        ]);
    }
}
