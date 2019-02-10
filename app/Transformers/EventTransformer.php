<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Event;
use App\Market;
use App\Odd;
use App\Bet;
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
            'id'           => (int)$event->id,
            'name'         => (string)$event->name,
            'date'         => (string)$this->parseDateTime($event->date_time),
            'leagueId'     => (int)$event->league_id,
            'leagueName'   => (!isset($event->league->name) ? null : $event->league->name),
            'sportName'    => (!isset($event->sport->name) ? null : $event->sport->name),
            'status'       => (string)$event->status->name,
            'markets'      => $this->_transformMarkets($event)
        ];
        
        return $return;
    }

    private function _transformMarkets($event){

        $markets = Market::all(array('id','name'));
        $results = collect();

        foreach($markets as $market){
            
            $odds = Odd::where('market_id','=',$market->id)
                ->where('event_id','=',$event->id)
                ->select(array('id','bet_id','market_id','value','special_value'))
                ->get();

            if (!$odds->isEmpty()){

                $eventMarketOdd = collect();

                foreach($odds as $odd){

                    $bet = Bet::where('id','=',$odd->bet_id)
                        ->select(array('id','name'))
                        ->first();

                    if ($bet){

                        $eventMarketOdd->push([
                            'id'            => (int)$odd->id,
                            'betName'       => (string)$bet->name,
                            'betId'         => (int)$bet->id,
                            'value'         => (double)$odd->value,
                            'specialValue'  => (double)$odd->special_value
                        ]);
                    }
                }

                $results->push([
                    'id'    => (int)$market->id,
                    'name'  => (string)$market->name,
                    'odds'  => $eventMarketOdd
                ]);
            }
        }
        
        return $results;
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
