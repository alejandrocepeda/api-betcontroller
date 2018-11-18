<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\User;

use App\Http\Resources\UsersResource;
use App\Http\Resources\UsersColletion;

class UserController extends ApiController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return new UsersColletion($users);
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
    public function register(Request $request)
    {
        $rules = ['name'        => 'required',
                  'password'    => 'required',
                  'email'       => 'required|email|unique:users', ];

        $this->validate($request, $rules);

        $request['password'] = bcrypt($request['password']);
        

        $user = User::create($request->all());
        $success['token'] =  $user->createToken('MyApp')->accessToken;

        //return $this->successResponse(['data'=>$user, 'message'=>'User Created'], 201);

        return response()->json([
            'data'      => $user,
            'token'     => $success['token'],
            'message'   => 'User Created',
        ]);
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
