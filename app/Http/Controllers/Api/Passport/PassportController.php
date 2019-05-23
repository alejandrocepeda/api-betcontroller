<?php

namespace App\Http\Controllers\Api\Passport;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

use Spatie\Permission\Traits\HasRoles;

class PassportController extends ApiController
{
    use HasRoles;
    
    public $successStatus = 200;

    public function login(Request $request)
    {
        
        $rules = ['email'    => 'required|email',
                  'password' => 'required|string|min:6', ];

        $this->validate($request, $rules);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken; 
            $user['token'] = $token;

            return $this->successResponse($user,200);
        } else {
            return $this->errorResponse('Unauthorized: Access is denied due to invalid credentials.', 401);
        }
    }
}
