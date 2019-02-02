<?php

namespace App\Http\Controllers\Api\League;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\League;

class LeagueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $leagues = League::all();
        return $this->showAll($leagues);
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
            'name'      => 'required',
            'sport_id'  => 'required',
        ];
        
        $this->validate($request, $rules);

        $league = League::create($request->all());

        return $this->successResponse(['data' => $league, 'message' => 'League Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(League $legaue)
    {
        //
        return $this->showOne($legaue);
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
    public function update(Request $request, League $league)
    {
        //
        $rules = [
            'name'  => 'required',
        ];

        $this->validate($request, $rules);

        $league->fill($request->all());
        if ($league->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        
        $league->save();

        return $this->successResponse(['data' => $league, 'message' => 'League Updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(League $league)
    {
        $league->delete();   
        return $this->successResponse(['data' => $league, 'message' => 'League Deleted'], 201);
    }
}
