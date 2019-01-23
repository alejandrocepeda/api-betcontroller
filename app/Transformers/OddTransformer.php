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
            'id'        => (int)$odd->id,
            'name'      => (string)$odd->name,
            'market'    => $odd->markets
        ];
    }
}
