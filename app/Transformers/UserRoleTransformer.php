<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;
class UserRoleTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'roles' => $user->roles
        ];
    }
}
