<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        $return = [
            'id'        => (int)$user->id,
            'name'      => (string)$user->name,
        ];

        return $return;
    }
}
