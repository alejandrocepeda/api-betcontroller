<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Market;

class MarketTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Market $market)
    {
        return [
            'id'        => (int)$market->id,
            'name'      => (string)$market->name,
            'odds'      => $market->odds
        ];
    }
}
