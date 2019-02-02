<?php

namespace App\Http\Controllers\Api\Odd;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Odd;

class OddController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $odd = Odd::all();

        return $this->showAll($odd); 
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
            'event_id'  => 'required',
            'market_id' => 'required',
            'bet_id'    => 'required',
        ];

        $this->validate($request, $rules);

        $odd = Odd::create($request->all());

        return $this->successResponse(['data'=> $odd, 'message' => 'Odd Created'], 201);
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Odd $odd)
    {
        return $this->showOne($odd);
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
    public function update(Request $request, Odd $odd)
    {
        //
        $rules = [
            'value'     => 'required',
            'event_id'  => 'required',
            'market_id' => 'required',
            'bet_id'    => 'required',
        ];

        $this->validate($request, $rules);

        $odd->fill($request->all());
        if ($odd->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        
        $odd->save();

        return $this->successResponse(['data' => $odd, 'message' => 'Odd updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odd $odd)
    {
        //

        $odd->delete();
        return $this->successResponse(['data' => $odd, 'message' => 'Odd Deleted'], 201);
    }
}
