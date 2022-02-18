<?php

namespace App\Http\Controllers;

use App\Models\Participantsview;
use Illuminate\Http\Request;

class ParticipantsviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myroomDetail($id,$rid)
    {
        $Participant = Participantsview::where('user_id',$id)->where('room_id',$rid)->get();
        $response = [
            'Room' => 'List Participant',
            'data' => $Participant
        ];
        return response()->json($response, 200);
    }
    public function myroom($id)
    {
        $Participant = Participantsview::where('user_id',$id)->get();
        $response = [
            'Room' => 'List Participant',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participantsviews  $participantsviews
     * @return \Illuminate\Http\Response
     */
    public function show(Participantsviews $participantsviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participantsviews  $participantsviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Participantsviews $participantsviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participantsviews  $participantsviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participantsviews $participantsviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participantsviews  $participantsviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participantsviews $participantsviews)
    {
        //
    }
}
