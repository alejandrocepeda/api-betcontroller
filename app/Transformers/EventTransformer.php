<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Event;
use Carbon\Carbon;

class EventTransformer extends TransformerAbstract 
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Event $event)
    {

        $return = [
            'id'            => (int)$event->id,
            'name'          => (string)$event->name,
            'date_time'     => (string)$this->parseDateTime($event->date_time),
            'league_id'     => (int)$event->league_id,
            'league'        => $event->league,
            'timezone'      => config('app.timezone'),
            'sport'         => $event->sport
        ];
        
        return $return;
    }

    public function parseDateTime($value)
    {   
       
        $timeZone = config('app.timezone');
       
        return Carbon::createFromTimestamp($value)
            ->timezone($timeZone)
            ->format('Y-m-d H:i'); 
        ;
    }
}
