<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function contactForm(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required',
            'subscription' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if (isset($data['subscribe']) && $data['subscribe']) {
            $already_subscribed = Contact::where('email', $data['email'])->count();
            if (!$already_subscribed) Contact::create(['email' => $data['email']]);
        }

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactMail($data));
        return response()->json(null, 204);
    }
}
