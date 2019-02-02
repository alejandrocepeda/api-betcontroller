<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Bookmaker;

class BookmakerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Bookmaker $bookmaker)
    {
        $return = [
            'id'        => (int)$bookmaker->id,
            'name'      => (string)$bookmaker->name,
            'status'    => (string)$bookmaker->status->name
        ];
        
        return $return;
    }
}
