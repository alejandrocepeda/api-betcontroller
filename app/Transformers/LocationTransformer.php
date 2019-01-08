<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Location;

class LocationTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Location $location)
    {
        return [
            'id'        => (int)$location->id,
            'name'      => (string)$location->name,
            'image'     => (string)$location->image,
            'events'    => $location->league,
        ];
    }
}
