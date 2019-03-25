<?php

namespace App;
use App\Transformers\BookmakerStatusTransformer;
use Illuminate\Database\Eloquent\Model;

class BookmakerStatus extends Model
{
    //
    protected $hidden = ['created_at','updated_at']; 

    public $transformer = BookmakerStatusTransformer::class;
}
