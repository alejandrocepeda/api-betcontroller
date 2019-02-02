<?php

namespace App;

use App\Transformers\MarketTransformer;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    protected $hidden = ['created_at','updated_at']; 

    public $transformer = MarketTransformer::class;

    public function bets(){
        return $this->hasMany('App\Bet');
    }

    public function status(){
        return $this->hasOne('App\MarketStatus','id','market_status_id');
    }
}
