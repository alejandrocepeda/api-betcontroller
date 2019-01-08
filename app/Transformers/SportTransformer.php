<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Sport;

class SportTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Sport $sport)
    {

        $return = [
            'id'        => (int)$sport->id,
            'name'      => (string)$sport->name,
        ];

        $dataLeague = [];

        foreach($sport->league as $league => $item){
            $dataLeague[] = array(
                'id'    => (int)$item->id,
                'name'  => (string)$item->name,
            );
        }

        $return['leagues'] = $dataLeague;

        return $return;
    }
}
