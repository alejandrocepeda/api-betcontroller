<?php

namespace App;
use App\Transformers\BookmakerTransformer;
use Illuminate\Database\Eloquent\Model;

class Bookmaker extends Model
{
    //
    public $transformer = BookmakerTransformer::class;

    protected $hidden = ['created_at','updated_at']; 

    protected $fillable = [
        'name','id'
    ];

    public function status(){
        return $this->hasOne('App\BookmakerStatus','id','bookmaker_status_id');
    }

    public function users(){
        return $this->hasMany('App\BookmakerUser','bookmaker_id')
            ->select(array('users.name','users.id'))
            ->join('users','users.id','bookmaker_users.user_id');
    }
}
