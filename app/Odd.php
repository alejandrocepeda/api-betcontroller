<?php

namespace App;

use App\Transformers\OddTransformer;
use Illuminate\Database\Eloquent\Model;

class Odd extends Model
{
    //
    protected $fillable = [
        'value','event_id','market_id','bet_id'
    ];

    protected $hidden = ['created_at','updated_at']; 

    public $transformer = OddTransformer::class;

    public function bets(){
        return $this->hasMany('App\Bet','id'); 
    }

    public function markets(){
        return $this->hasMany('App\Market','id'); 
    }
}
