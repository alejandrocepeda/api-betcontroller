<?php

namespace App\Http\Controllers\Api\Sport;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Sport;

class SportController extends ApiController
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
        return $this->showAll($sports);
    }

    public function getGuzzleRequest(Request $request)
    {
        //dd($request->id);
        
        if (!isset($request->id)){
            $request->id = 0;
        }
        
        $url = 'http://winnerbetweb.net/HandlerQt.ashx?IDPalinsesto='.$request->id.'&IDRaggruppamento=0&FiltroVis=all&method=OddsRaggr';

        $client = new \GuzzleHttp\Client();
        $request = $client->get($url,[
            'headers' => [
                'Accept-Language' => 'en-EN,es;q=0.9'
            ]
        ]);

        $response =  json_decode($request->getBody()->getContents(), true);
       
        return $response;
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

        $sport = Sport::create($request->all());

        return $this->successResponse(['data'=> $sport, 'message' => 'Sport Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        return $this->showOne($sport);
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
    public function update(Request $request, Sport $sport)
    {
        //
        $rules = [
            'name'  => 'required',
        ];

        $this->validate($request, $rules);

        $sport->fill($request->all());
        if ($sport->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        
        $sport->save();

        return $this->successResponse(['data' => $sport, 'message' => 'Sport Updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();
        return $this->successResponse(['data' => $sport, 'message' => 'Sport Deleted'], 201);
    }
}
