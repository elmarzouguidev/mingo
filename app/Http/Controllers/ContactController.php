<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\ContactRequest;
use App\Mail\Contact\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('theme.contact.index');
    }

    public function store(ContactRequest $request)
    {
        $data = $request->except(['_token', 'valid_from']);

        $email = setting('contact.email_reciver') ?? 'contact@'.request()->getHost();

        if ($email) {

            dispatch(function () use ($email, $data) {

                Mail::to($email)->send(new ContactMail($data));

            })->afterResponse();

            return redirect()->route('contact')->with('isSent', 'merci pour votre message');
        }
    }
}
