<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Market;
use Illuminate\Support\Collection;

class MarketTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Market $market)
    {
        return [
            'id'        => (int)$market->id,
            'name'      => (string)$market->name,
            'status'    => (string)$market->status->name,
            'bets'      => $this->_transformBets($market->bets)
        ];
    }

    private function _transformBets($bets){
        
        return $bets->transform(function($item, $key) {
            return [
                'id'            => (int)$item->id,
                'name'          => (string)$item->name,
                'marketId'      => (int)$item->market_id,
                'description'   => (string)$item->description
            ];
        });
    }
}
