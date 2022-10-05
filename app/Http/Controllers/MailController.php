<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendemail()
    {
        $maildata = ["name"=> 'Ali Tahir',"dob"=>'17/5/2003'];
    
        Mail::to("Ali@example.com")->send(new WelcomeMail($maildata));
        dd("MAIL SENT SUCCESFULLY");
    }
}
