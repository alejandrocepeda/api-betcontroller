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
            'status'    => $bookmaker->status,
            'users'     => $this->_transformUsers($bookmaker->users)
        ];
        
        return $return;
    }

    private function _transformUsers($users){
        
        return $users->transform(function($item, $key) {
            return [
                'id'            => (int)$item->id,
                'name'          => (string)$item->name
            ];
        });
    }
}
