<?php

namespace App;
use App\Transformers\UserStatusTransformer;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    //

    public $transformer = UserStatusTransformer::class;

    protected $hidden = ['created_at','updated_at']; 
}
