<?php

namespace App;

use App\Transformers\LocationTransformer;
use Illuminate\Database\Eloquent\Model;
 
class Location extends Model
{
    //

    protected $hidden = ['created_at','updated_at']; 

    public $transformer = LocationTransformer::class;
    
    
    public function league(){
        return $this->hasMany('App\League');  
    }
}
