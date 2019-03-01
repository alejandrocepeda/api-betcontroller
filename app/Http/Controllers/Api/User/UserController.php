<?php
namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\User;

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
        return $this->showAll($users);
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
        $rules = [
            'name'        => 'required|min:6',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|min:6',
        ];

        $this->validate($request, $rules);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request['password']),
        ]);

        $token  =  $user->createToken('MyApp')->accessToken;
        $user['token'] = $token;

        return $this->successResponse(['data'=> $user, 'message'=>'User Created'], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return $this->showOne($user);
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
    public function update(Request $request, User $user)
    {
        //
        $rules = [
            'name'        => 'min:6',
            'password'    => 'min:6',
            'email'       => 'email',
        ];

        $this->validate($request, $rules);

        if ($request->has('password')){
            $request['password'] = bcrypt($request['password']);
        }
        
        $user->fill($request->all());
        if ($user->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        
        $user->save();

        return $this->successResponse(['data' => $user, 'message' => 'User Updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();   
        return $this->successResponse(['data' => $user, 'message' => 'User Deleted'], 201);
    }
}
