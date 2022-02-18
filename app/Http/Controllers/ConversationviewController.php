<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Conversationview;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConversationviewController extends Controller
{

    public function index()
    {
        $Conversationview = Conversationview::get();
        $response = [
            'Conversationview' => 'List Conversationview',
            'data' => $Conversationview
        ];
        return response()->json($response, 200);
    }
    public function roomDetail($id)
    {
        $Conversationview = Conversationview::where('room_id', $id)->get();

        $response = [
            'Conversationview' => 'Detail of Conversationview '.$id,
            'data' => $Conversationview
        ];

        return $response;
    }

   
   
  
}
