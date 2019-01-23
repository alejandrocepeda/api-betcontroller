<?php

namespace App;

use App\Transformers\OddTransformer;
use Illuminate\Database\Eloquent\Model;

class Odd extends Model
{
    //
    protected $fillable = [
        'name',
        'market_id'
    ];
    protected $hidden = ['created_at','updated_at']; 

    public $transformer = OddTransformer::class;

    public function markets(){
        return $this->hasOne('App\Market','id','market_id'); 
    }
}
