<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function index()
    {
    }

    // メール送信
    public function sendMail(Request $request) 
    {
        $data = array('name'=>$request->name);
        $data += array('email'=>$request->email);
        $data += array('textarea'=>$request->textarea);
        
    	Mail::send('contact', $data, function($message){
    	    $message->to('oinari.work@gmail.com')
                ->subject('【YourTube】お問い合わせがありました。');
    	});
    }
}
