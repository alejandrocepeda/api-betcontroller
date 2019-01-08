<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\League;

class LeagueTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(League $league)
    {
        return [
            //
            'id'            => (int)$league->id,
            'name'          => (string) $league->name,
            'sport_id'      => (int)$league->sport_id,
            'location_id'   => (int)$league->location_id,
            'sport'         => $league->sport,
            'events'        => $league->event
        ];
    }
}


