<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Transformers\RoleTransformer;
use Spatie\Permission\Models\Role as Model;

class Role extends Model
{
    //

    public $transformer = RoleTransformer::class;

   
}
