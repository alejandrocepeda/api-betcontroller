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

    public function odds(){
        return $this->hasMany('App\Odd','market_id'); 
    }
}
