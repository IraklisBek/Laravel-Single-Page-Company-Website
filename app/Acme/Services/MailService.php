<?php

namespace App\Acme\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailService{

    public static function sendEmail($data, $kind){
        Mail::send($kind, $data, function($message) use ($data){
            $message->from('someone@gmail.com');//$data['email']
            $message->to('iraklis@gmail.com');
            $message->subject('Contact');
        });
    }

}