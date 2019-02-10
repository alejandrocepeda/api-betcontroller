<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use Spatie\Permission\Models\Role;


class RoleTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Role $role)
    {
        return [
            'id'            => (int)$role->id,
            'name'          => (string)$role->name,
            'permissions'   => $this->_transformPermissions($role->permissions),
            'users'         => $this->_transformUsers($role->users),
        ];
    }

    private function _transformUsers($users){
        
        return $users->transform(function($item, $key) {
            return [
                'id'            => (int)$item->id,
                'name'          => (string)$item->name,
                'emai'          => (string)$item->email
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
}
