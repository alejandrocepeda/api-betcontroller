<?php

namespace App;

use App\Transformers\LeagueTransformer;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    //

    protected $fillable = [
        'name','sport_id','location_id'
    ];

    protected $hidden = ['created_at','updated_at']; 

    public $transformer = LeagueTransformer::class;
    
    public function sport(){
        return $this->belongsTo('App\Sport');  
    }

    public function event(){
        return $this->hasMany('App\Event');  
    }
}
