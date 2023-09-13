<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
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
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactMail($data));
        return response()->json(null, 204);
    }
}
