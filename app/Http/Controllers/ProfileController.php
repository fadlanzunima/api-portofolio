<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::orderBy('time', 'DESC')->get();
        $response = [
            'status' => 200,
            'message' => 'List profile order by time',
            'data' => $profile
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'email' => ['required'],
            'description' => ['required'],
            'date_of_birth' => ['required'],
            'place_of_birth' => ['required'],
            'address' => ['required'],
            'role' => ['required'],
            'avatar',
        ]);
        

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            // $destination = 'assets/profile/';
            // $filename = $this->generateRandomString(32).'.'.$image->getClientOriginalExtension();
            // $upload = $image->move($destination, $filename);
            
            // $source = $destination.$filename;

            $proflie = Profile::create($request->all());
            $response = [
                'status' => 201,
                'message' => 'Profile created',
                'data' => $proflie
            ];

            return response()->json($response, 200);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
