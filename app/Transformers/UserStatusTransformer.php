<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\UserStatus;

class UserStatusTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserStatus $userstatus)
    {
        $return = [
            'id'            => (int)$userstatus->id,
            'name'          => (string)$userstatus->name
        ];

        return $return;
    }
}
