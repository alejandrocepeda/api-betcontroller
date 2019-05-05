<?php

namespace App;
use App\Transformers\BetTransformer;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{

    protected $fillable = [
        'id',
        'name',
        'market_id'
    ];
    
    protected $hidden = ['created_at','updated_at']; 

    public $transformer = BetTransformer::class;

    public function market(){
        return $this->belongsTo('App\Market'); 
    }
}
