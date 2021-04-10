<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details = [
            'title' => 'Good afternoon! This is the test email',
            'body' => 'You can also update your email preferences here to stay notified on updates important to you.'
        ];

        Mail::to("mkzhnv.01@gmail.com")->send(new TestMail($details));
        return "Email Sent";
    }
}
