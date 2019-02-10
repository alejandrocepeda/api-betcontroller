<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Route;

use Spatie\Permission\Models\Role;


class PermissionMiddleware
{
    use ApiResponser;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = auth()->user();
        
        $permission = Route::currentRouteName();
        
        if (!$user->hasRole('Admin') and !$user->can($permission)){
            return $this->errorResponse('User have not permission for the resource '.$permission,201);
        }
        
        return $next($request);
    }
   
}