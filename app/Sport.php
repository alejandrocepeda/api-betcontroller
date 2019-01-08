<?php

namespace App;
use App\Transformers\SportTransformer;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','id'
    ];

    /**x`
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at'
    ];

    public $transformer = SportTransformer::class;

    public function league(){
        return $this->hasMany('App\League');  
    }
}
