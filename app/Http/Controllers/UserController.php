<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
               
           $request->merge(['password' => Hash::make($request->input('password'))]);
            $request->merge(['remember_token' => Str::random(60)]);
           $User = User::create($request->all());
           $name = $User->file->getClientOriginalName();
           $path = $request->file('file')->store('public/files');
           $a = strlen($path);
           $b = substr($path, 7,$a);

           //store your file into directory and db
           $User->file = new User();
           $User->file = 'storage/'.$b;
           $User->save();
           $response = [
               'message' => 'User Created',
               'data' => $User
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = User::findOrFail($id);

        $response = [
            'message' => 'Detail of User '.$id,
            'data' => $User
        ];

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
     

       ]);

       if($validator->fails()){
           return response()->json($validator->errors(), 
           Response::HTTP_UNPROCESSABLE_ENTITY);
       }

       try {
           $User->update($request->all());
           $response = [
               'message' => 'User Updated',
               'data' => $User
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
      
        try {
            $User->delete();
            $response = [
                'message' => 'User '.$id.' Deleted'
            ];
            return $response;
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
         
        }
    }
}
