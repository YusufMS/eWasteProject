<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class messageController extends Controller
{
    public function store(Request $request)
    {


        $message = new message();



        $message->message_body  = $request->message_body;
        $message->receiver = $request->receiver;
        $message->sender = $request->sender;

        $message->save();

        return response()->json($message);


    }
}
