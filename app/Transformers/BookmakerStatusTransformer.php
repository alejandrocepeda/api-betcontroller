<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\BookmakerStatus;

class BookmakerStatusTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(BookmakerStatus $bookmakerstatus)
    {
        $return = [
            'id'            => (int)$bookmakerstatus->id,
            'name'          => (string)$bookmakerstatus->name
        ];

        return $return;
    }
}
