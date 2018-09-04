<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatHistory;

class ChattingController extends Controller
{
    public function home()
    {
    	return view('home');
    }

    public function sendMessage(Request $request)
    {
    	ChatHistory::create(['sender_id'=>1,
    				'text'=>$request->message,
    				'receiver_id'=>2]);
    }

    public function getMessage()
    {
    	$data = ChatHistory::get();
    	return $data;
    }
}
