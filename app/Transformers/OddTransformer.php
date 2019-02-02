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
            'market_id'         => (int)$odd->market_id,
            'bet_id'            => (int)$odd->bet_id,
            'value'             => (double)$odd->value,
            'specialValue'      => (double)$odd->specialValue,
            'market'            => $odd->market
        ];
    }
}
