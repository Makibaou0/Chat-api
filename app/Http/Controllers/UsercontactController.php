<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Usercontact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsercontactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Message = UserContact:: orderBy('id', 'DESC')->get();
        $response = [
            'message' => 'List Contact',
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
    //     $validator = Validator::make($request->all(), [
    //         'id' => ['required'],

    //    ]);

    //    if($validator->fails()){
    //        return response()->json($validator->errors(), 
    //        Response::HTTP_UNPROCESSABLE_ENTITY);
    //    }

       try {
           $Usercontact = Usercontact::create($request->all());
                //    $Usercontact->daftar_menu = json_encode(daftar_menu); 
           $response = [
               'message' => 'Usercontact Created',
               'data' => $Usercontact
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
     * @param  \App\Models\Usercontact  $Usercontact
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $Usercontact = Usercontact::where('saver',$id)->get();

        $response = [
            'message' => 'Detail of Usercontact '.$id,
            'data' => $Usercontact
        ];

        return $response;

    
    }
     public function delete_contact($id,$id_contact)
    {
        $Usercontact = Usercontact::findOrFail($id);
        // $Usercontact = $Usercontact->data_contact;
        // $Usercontact = Usercontact::findOrFail($id_contact);

        $response = [
            'message' => 'Detail of Usercontact '.$id,
            'data' => $Usercontact
        ];

        return $response;

    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usercontact  $Usercontact
     * @return \Illuminate\Http\Response
     */
    public function edit(Usercontact $Usercontact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usercontact  $Usercontact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $Usercontact = Usercontact::findOrFail($id);

        $validator = Validator::make($request->all(), [
     

       ]);

       if($validator->fails()){
           return response()->json($validator->errors(), 
           Response::HTTP_UNPROCESSABLE_ENTITY);
       }

       try {
           $Usercontact->update($request->all());
           $response = [
               'message' => 'Usercontact Updated',
               'data' => $Usercontact
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
     * @param  \App\Models\Usercontact  $Usercontact
     * @return \Illuminate\Http\Response
     */

     public function delete()
    {
        Usercontact::query()->delete();
    }
    public function destroy($id)
    {
        $Usercontact = Usercontact::findOrFail($id);
      
       try {
           $Usercontact->delete();
           $response = [
               'message' => 'Usercontact '.$id.' Deleted'
           ];
           return $response;
       } catch (QueryException $e) {
           return response()->json([
               'message' => "Failed " . $e->errorInfo
           ]);
        
       }
    }
}
