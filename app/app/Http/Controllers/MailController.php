<?php

namespace App\Http\Controllers;
use App\Mail\Contacted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
    }

    // メール送信
    public function sendMail(Request $request) {
        $request->name = '名前';
        $request->email = 'メール';
        $request->textarea = '本文';
        return \Mail::to('oinari1000@yahoo.co.jp')->send(new Contacted($request));
    }
}
