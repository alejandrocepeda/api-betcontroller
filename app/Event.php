<?php

namespace App;

use App\Transformers\EventTransformer;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    //
    protected $fillable = [
        'name','league_id','date','start'
    ];

    protected $relationships = ['league.sport'];

    protected $hidden = ['created_at','updated_at']; 
    
    public $transformer = EventTransformer::class;
    
    public function sport(){
        return $this->hasOne('App\Sport','id','sport_id'); 
    }
    

    public function league(){
        return $this->hasOne('App\League','id','league_id');  
    }
}