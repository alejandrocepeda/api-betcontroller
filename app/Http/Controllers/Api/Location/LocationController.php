<?php

namespace App\Http\Controllers\Api\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Location;

class LocationController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $location = Location::all();

        return $this->showAll($location);   
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
            'name'  => 'required|max:100'
        ];
        
        $this->validate($request, $rules);

        $location = Location::create($request->all());

        return $this->successResponse(['data' => $location, 'message' => 'Location Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return $this->showOne($location);
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
    public function update(Request $request, Location $location)
    {
        $rules = [
            'name'  => 'required',
        ];

        $this->validate($request, $rules);

        $location->fill($request->all());
        if ($location->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        
        $location->save();

        return $this->successResponse(['data' => $location, 'message' => 'Location Updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();   
        return $this->successResponse(['data' => $location, 'message' => 'Location Deleted'], 201);
    }
}
