<?php

namespace App;

use App\Transformers\LeagueTransformer;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    //

    protected $hidden = ['created_at','updated_at']; 

    public $transformer = LeagueTransformer::class;
    
    public function sport(){
        return $this->hasOne('App\Sport','id','sport_id');  
    }

    public function event(){
        return $this->hasMany('App\Event');  
    }
}
