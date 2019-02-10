<?php

namespace App\Http\Controllers\Api\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Role;

class RoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return $this->showAll($roles);
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
        $rules = [
            'name'          => 'required|max:100|min:4',
        ];
        
        $this->validate($request, $rules);

        $role = Role::create(['name' => $request->name]);

        return $this->successResponse(['data' => $role, 'message' => 'Role Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return $this->showOne($role);
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
    public function update(Request $request, Role $role)
    {
        $rules = [
            'name'  => 'max:100|min:4',
        ];

        $this->validate($request, $rules);

        $role->fill($request->all());
        if ($role->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        
        $role->save();

        return $this->successResponse(['data' => $role, 'message' => 'Role updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return $this->successResponse(['data' => $role, 'message' => 'Role Deleted'], 201);
    }
}
