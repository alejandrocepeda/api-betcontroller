<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser{

    protected function successResponse($data,$code){
        return response()->json($data,$code);
    }

    protected function errorResponse($mesaage,$code){
        return response()->json(['error' => $mesaage,'code' => $code],$code);
    }

    protected function showAll(Collection $collection,$code = 200){
        return $this->successResponse(['1data' => $collection],$code);
    }

    public function showOne(Model $model,$code = 200){
        return $this->successResponse(['1data' => $model],$code);
    }


}