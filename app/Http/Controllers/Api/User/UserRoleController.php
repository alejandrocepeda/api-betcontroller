<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Collection;

class UserRoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
    }

    public function syncRoles(Request $request, User $user){

        if (!$request->has('roles')){
            return $this->errorResponse('The role parameter is missing', 422);
        }
        
        $roles = array_column($request->roles, 'name');
       
        $user->syncRoles($roles);
        $user->refresh();

        
        return $this->successResponse(['data' => $user,'message' => 'Role Group Updated'],201);   
    }
   
    public function update(Request $request, User $user, Role $role)
    {
        
        if ($user->hasRole($role)) {
            return $this->errorResponse('User already has this Role', 422);
        }

        $user->syncRoles($role);
        $user->refresh();
        $roles = $user->roles;

        return $this->successResponse(['data' => $roles, 'message' => 'Role Updated'],201);
    }
}
