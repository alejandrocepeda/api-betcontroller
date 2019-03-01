<?php

namespace App;

use App\Transformers\EventTransformer;
use Illuminate\Database\Eloquent\Model;

use App\Odd;
use App\League;
use App\Market;

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
        $result =  $this->hasOne('App\League','id','league_id')
        ->join('sports', 'sports.id', '=', 'leagues.sport_id')
        ->select(array('sports.name'));
        
        return $result;
    }

    public function status(){
        return $this->hasOne('App\EventStatus','id','event_status_id');
    }

    public function odds(){
        return $this->hasMany('App\Odd','event_id');
    }
   
    public function league(){
        return $this->belongsTo('App\League');
    }
}