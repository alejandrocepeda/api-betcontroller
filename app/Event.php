<?php

namespace App;

use App\Transformers\EventTransformer;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    //
    protected $fillable = [
        'name','league_id','idevento','date','start'
    ];

    protected $hidden = ['created_at','updated_at']; 


    public $transformer = EventTransformer::class;

}