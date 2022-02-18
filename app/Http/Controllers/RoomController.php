<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Room = Room:: orderBy('id', 'DESC')->get();
        $response = [
            'Room' => 'List Room',
            'data' => $Room
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
           $Room = Room::create($request->all());
           $response = [
               'Room' => 'Room Created',
               'data' => $Room
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'Room' => "Failed " . $e->errorInfo
           ]);
        
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $Room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Room = Room::findOrFail($id);

        $response = [
            'Room' => 'Detail of Room '.$id,
            'data' => $Room
        ];

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $Room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $Room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $Room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Room = Room::findOrFail($id);


       try {
           $Room->update($request->all());
           $response = [
               'Room' => 'Room Updated',
               'data' => $Room
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'Room' => "Failed " . $e->errorInfo
           ]);
        
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $Room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Room = Room::findOrFail($id);
      
        try {
            $Room->delete();
            $response = [
                'Room' => 'Room Deleted'
            ];
            return $response;
        } catch (QueryException $e) {
            return response()->json([
                'Room' => "Failed " . $e->errorInfo
            ]);
         
        }
    }
}
