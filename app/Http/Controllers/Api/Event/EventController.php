<?php

namespace App\Http\Controllers\Api\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Event;

class EventController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //public $relationships = ['league'];

    public function index(Request $request)
    {
        //

        $events = Event::all();
        return $this->showAll($events);
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

       
        $event = Event::create($request->all());

        return $this->successResponse(['data' => $event, 'message' => 'Event Created'], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return $this->showOne($event);
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
    public function update(Request $request, Event $event)
    {
        //

        $rules = [
            'name'  => 'required',
        ];

        $this->validate($request, $rules);

        $event->fill($request->all());
        if ($event->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        
        $event->save();

        return $this->successResponse(['data' => $event, 'message' => 'Event updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
        
        return $this->successResponse(['data' => $event, 'message' => 'Event Deleted'], 201);
    }
}
