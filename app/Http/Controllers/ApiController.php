<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Traits\DateFilterEventTrait;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    use ApiResponser;
    
    use DateFilterEventTrait;
    /*
    public function __construct(Request $request) 
    {
        //$this->middleware('auth:api');
        //$this->middleware('permission');
    }
    */
    
}
