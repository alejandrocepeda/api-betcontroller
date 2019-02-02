<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Bet;

class BetTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Bet $bet)
    {
        return [
            'id'           => (int)$bet->id,
            'name'         => (string)$bet->name,
            'marketName'   => (string)$bet->market->name
        ];
    }
}
