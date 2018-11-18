<?php

namespace App\Http\Controllers\Api\Sport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sport;

use App\Http\Resources\SportsResource;
use App\Http\Resources\SportsColletion;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $sports = Sport::all();
        return new SportsColletion($sports);
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
            'idsport'   => 'required',
        ];

        $this->validate($request, $rules);

        $sport = Sport::create($request->all());

        return response()->json([
            'data'      => $sport,
            'message'   => 'Sport Created',
        ]);

        //return $this->successResponse(['data'=> $sport, 'message'=>'Sport Created'], 201);
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
        $sports = Sport::find($id);
        return new SportsResource($sports);
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
