<?php

namespace App\Http\Controllers\Api\Bookmaker;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Bookmaker;

class BookmakerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookmaker = Bookmaker::all();
        return $this->showAll($bookmaker);
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
            'name' => 'required|max:100',
        ];
        
        $this->validate($request, $rules);

        $bookmaker = Bookmaker::create($request->all());

        return $this->successResponse(['data' => $bookmaker, 'message' => 'Bookmaker Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmaker $Bookmaker)
    {
        //
        return $this->showOne($Bookmaker);
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
    public function update(Request $request, Bookmaker $bookmaker)
    {
        $rules = [
            'name'  => 'required',
        ];

        $this->validate($request, $rules);

        $bookmaker->fill($request->all());
        if ($bookmaker->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        
        $bookmaker->save();

        return $this->successResponse(['data' => $bookmaker, 'message' => 'Bookmaker updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmaker $bookmaker)
    {
        $bookmaker->delete();   
        return $this->successResponse(['data' => $bookmaker, 'message' => 'Bookmaker Deleted'], 201);
    }
}
