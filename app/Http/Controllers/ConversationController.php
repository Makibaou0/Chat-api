<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
    //     $validator = Validator::make($request->all(), [
    //         'id' => ['required'],

    //    ]);

    //    if($validator->fails()){
    //        return response()->json($validator->errors(), 
    //        Response::HTTP_UNPROCESSABLE_ENTITY);
    //    }

       try {
           $Conversation = Conversation::create($request->all());
                //    $Conversation->daftar_menu = json_encode(daftar_menu); 
           $response = [
               'message' => 'Conversation Created',
               'data' => $Conversation
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
     * @param  \App\Models\Conversation  $Conversation
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        
        $Conversation = Conversation::where('sender', $id)
                     ->orWhere('receiver', $id)
                     ->get();

        $response = [
            'message' => 'Detail of Conversation '.$id,
            'data' => $Conversation
        ];

        return $response;

    
    }
     public function delete_contact($id,$id_contact)
    {
        $Conversation = Conversation::findOrFail($id);
        // $Conversation = $Conversation->data_contact;
        // $Conversation = Conversation::findOrFail($id_contact);

        $response = [
            'message' => 'Detail of Conversation '.$id,
            'data' => $Conversation
        ];

        return $response;

    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conversation  $Conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $Conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conversation  $Conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $Conversation = Conversation::findOrFail($id);

        $validator = Validator::make($request->all(), [
     

       ]);

       if($validator->fails()){
           return response()->json($validator->errors(), 
           Response::HTTP_UNPROCESSABLE_ENTITY);
       }

       try {
           $Conversation->update($request->all());
           $response = [
               'message' => 'Conversation Updated',
               'data' => $Conversation
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
     * @param  \App\Models\Conversation  $Conversation
     * @return \Illuminate\Http\Response
     */

     public function delete()
    {
        Conversation::query()->delete();
    }
    public function destroy($id)
    {
        $Conversation = Conversation::findOrFail($id);
      
       try {
           $Conversation->delete();
           $response = [
               'message' => 'Conversation '.$id.' Deleted'
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'message' => "Failed " . $e->errorInfo
           ]);
        
       }
    }
}
