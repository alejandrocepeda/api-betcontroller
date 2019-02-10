<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Odd;


class OddTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Odd $odd)
    {
        return [
            'id'                => (int)$odd->id,
            'eventId'           => (int)$odd->event_id,
            'marketId'          => (int)$odd->market_id,
            'marketName'        => (string)$odd->market->name,
            'betId'             => (int)$odd->bet_id,
            'betName'           => (string)$odd->bet->name,
            'betDescription'    => (string)$odd->bet->description,
            'value'             => (double)$odd->value,
            'specialValue'      => (double)$odd->specialValue,
        ];
    }

  
}
