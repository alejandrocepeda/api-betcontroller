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

    public function bet(){
        return $this->hasOne('App\Bet','id','bet_id'); 
    }

    public function market(){
        return $this->hasOne('App\Market','id','market_id'); 
    }
}
