<?php

namespace App\Http\Controllers\Api\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Market;

class MarketController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $market = Market::all();

        return $this->showAll($market); 
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

       
        $market = Market::create($request->all());

        return $this->successResponse(['data' => $market, 'message' => 'Market Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        //
        return $this->showOne($market);
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
    public function update(Request $request, Market $market)
    {
        $rules = [
            'name'  => 'required',
        ];

        $this->validate($request, $rules);

        $market->fill($request->all());
        if ($market->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        
        $market->save();

        return $this->successResponse(['data' => $market, 'message' => 'Market updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        //

        $market->delete();
        
        return $this->successResponse(['data' => $market, 'message' => 'Market Deleted'], 201);
    }
}
