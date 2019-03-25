<?php

namespace App;
use App\Transformers\UserTransformer;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasRoles;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_status_id'
    ];

    public $transformer = UserTransformer::class;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at','email_verified_at'
    ];

    public function status(){
        return $this->hasOne('App\UserStatus','id','user_status_id');
    }
    
    public function bookmakers()
    {
        return $this->hasOne('App\BookmakerUser','user_id')
            ->select(array('bookmakers.name','bookmaker_users.bookmaker_id'))
            ->join('bookmakers','bookmakers.id','bookmaker_users.bookmaker_id');
    }
   
}
