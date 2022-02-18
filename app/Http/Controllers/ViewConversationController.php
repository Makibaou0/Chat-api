<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\ViewConversation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ViewConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ViewConversation = ViewConversation:: orderBy('id', 'DESC')->get();
        $response = [
            'ViewConversation' => 'List ViewConversation',
            'data' => $ViewConversation
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
      

       try {
           $ViewConversation = ViewConversation::create($request->all());
           $response = [
               'ViewConversation' => 'ViewConversation Created',
               'data' => $ViewConversation
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'ViewConversation' => "Failed " . $e->errorInfo
           ]);
        
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ViewConversation  $ViewConversation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ViewConversation = ViewConversation::findOrFail($id);

        $response = [
            'ViewConversation' => 'Detail of ViewConversation '.$id,
            'data' => $ViewConversation
        ];

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ViewConversation  $ViewConversation
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewConversation $ViewConversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ViewConversation  $ViewConversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ViewConversation = ViewConversation::findOrFail($id);


       try {
           $ViewConversation->update($request->all());
           $response = [
               'ViewConversation' => 'ViewConversation Updated',
               'data' => $ViewConversation
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'ViewConversation' => "Failed " . $e->errorInfo
           ]);
        
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ViewConversation  $ViewConversation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ViewConversation = ViewConversation::findOrFail($id);
      
        try {
            $ViewConversation->delete();
            $response = [
                'ViewConversation' => 'ViewConversation Deleted'
            ];
            return $response;
        } catch (QueryException $e) {
            return response()->json([
                'ViewConversation' => "Failed " . $e->errorInfo
            ]);
         
        }
    }
}
