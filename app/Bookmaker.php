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
}
