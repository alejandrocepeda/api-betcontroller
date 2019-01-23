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

        return $this->hasManyThrough(
            'App\Sport',
            'App\League',
            'id', // Local key on users Sport...
            'id', // Local key on posts League...
            'league_id', // Foreign key on countries Event...
            'sport_id' // Foreign key on users League...
        );
    }
    

    public function league(){
        return $this->hasOne('App\League','id','league_id');  
    }
    
}