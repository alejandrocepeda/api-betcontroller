<?php

namespace App\Traits;

trait ApiResponser{

    private function successResponse($data,$code){
        return response()->json($data,$code);
    }

    private function errorResponse($mesaage,$code){
        return response()->json(['error' => $mesaage,'code' => $code],$code);
    }

    public function showAll(Collection $collection,$code = 200){
        return $this->successResponse(['1data' => $collection],$code);
    }

    public function showOne(Model $model,$code = 200){
        return $this->successResponse(['1data' => $model],$code);
    }


}