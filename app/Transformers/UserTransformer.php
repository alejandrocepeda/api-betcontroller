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
            'id'            => (int)$user->id,
            'name'          => (string)$user->name,
            'status'        => (string)$user->status->name,
            'email'         => (string)$user->email,
            'bookmakers'    => $this->_transformBookmakers($user->bookmakers),
            'roles'         => $this->_transformRoles($user->roles),
            'permissions'   => $this->_transformPermissions($user->permissions)
        ];

        return $return;
    }

    

    private function _transformRoles($roles){
        
        return $roles->transform(function($item, $key) {
            return [
                'id'            => (int)$item->id,
                'name'          => (string)$item->name,
                'guardName'     => (string)$item->guard_name
            ];
        });
    }

    private function _transformPermissions($permissions){
        
        return $permissions->transform(function($item, $key) {
            return [
                'id'            => (int)$item->id,
                'name'          => (string)$item->name,
                'guardName'     => (string)$item->guard_name
            ];
        });
    }

    private function _transformBookmakers($bookmakers){
        
        return $bookmakers->transform(function($item, $key) {
            return [
                'id'            => (int)$item->bookmaker_id,
                'name'          => (string)$item->name
            ];
        });
    }
}
