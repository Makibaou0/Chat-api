<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Participant = Participant:: orderBy('id', 'DESC')->get();
        $response = [
            'Participant' => 'List Participant',
            'data' => $Participant
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
           $Participant = Participant::create($request->all());
           $response = [
               'Participant' => 'Participant Created',
               'data' => $Participant
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'Participant' => "Failed " . $e->errorInfo
           ]);
        
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Participant = Participant::findOrFail($id);

        $response = [
            'Participant' => 'Detail of Participant '.$id,
            'data' => $Participant
        ];

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $Participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Participant = Participant::findOrFail($id);


       try {
           $Participant->update($request->all());
           $response = [
               'Participant' => 'Participant Updated',
               'data' => $Participant
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'Participant' => "Failed " . $e->errorInfo
           ]);
        
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Participant = Participant::findOrFail($id);
      
        try {
            $Participant->delete();
            $response = [
                'Participant' => 'Participant Deleted'
            ];
            return $response;
        } catch (QueryException $e) {
            return response()->json([
                'Participant' => "Failed " . $e->errorInfo
            ]);
         
        }
    }
}
