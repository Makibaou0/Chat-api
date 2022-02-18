<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Message = Message:: orderBy('id', 'DESC')->get();
        $response = [
            'message' => 'List Message',
            'data' => $Message
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $validator = Validator::make($request->all(),[ 
    //         'file' => 'required|mimes:doc,docx,pdf,txt,csv,png,jpg,jpeg|max:2048',
    //   ]);   

    //   if($validator->fails()) {          
          
    //       return response()->json(['error'=>$validator->errors()], 401);                        
    //    }  


       try {
           
           $Message = Message::create($request->all());
        //    $path = $Message->file->store('public/files');
        //    $name = $Message->file->getClientOriginalName();
        //    $path = $request->file('file')->store('public/files');
        //    $a = strlen($path);
        //    $b = substr($path, 7,$a);

        //    //store your file into directory and db
        //    $Message->file = new Message();
        //    $Message->file = 'storage/'.$b;
        //    $Message->save();

           $response = [
               'message' => 'Message Created',
               'data' => $response
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'message' => "Failed " . $e->errorInfo
           ]);
        
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Message = Message::findOrFail($id);

        $response = [
            'message' => 'Detail of Message '.$id,
            'data' => $Message
        ];

        return $response;
    }
    public function showbyroom($id)
    {
        $Message = Message::where('roomId', $id)->get();

        $response = [
            'message' => 'Detail of Message '.$id,
            'data' => $Message
        ];

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $Message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Message = Message::findOrFail($id);


       try {
           $Message->update($request->all());
           $response = [
               'message' => 'Message Updated',
               'data' => $Message
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'message' => "Failed " . $e->errorInfo
           ]);
        
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Message = Message::findOrFail($id);
      
        try {
            $Message->delete();
            $response = [
                'message' => 'Message Deleted'
            ];
            return $response;
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
         
        }
    }
}
