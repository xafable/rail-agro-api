<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Http\Resources\BaseResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    function index(){
        $messages = Message::query()
            ->get();

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => BaseResource::collection($messages)
        ]);
    }

    function store(Request $request){
        $message = Message::query()
            ->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'comment' => $request->comment,
            ]);

        if($message)
            event(new MessageCreated($message));

        return response()->json([
            'success' => true,
            'message' => 'Запит відправлено.',
            'data' => new BaseResource($message)
        ]);
    }
}
