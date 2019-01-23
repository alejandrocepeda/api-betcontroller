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

        if ($collection->isEmpty()){
            return $this->successResponse(['data' => $collection],$code);
        }

        $transformer = $collection->first()->transformer;
        $collection = $this->transformData($collection, $transformer);

        return $this->successResponse($collection,$code);
    }

    public function showOne(Model $model,$code = 200){

        $transformer = $model->transformer;
        $model = $this->transformData($model, $transformer);

        return $this->successResponse($model,$code);
    }

    protected function transformData($data,$transformer){
        
        $transformation = fractal($data, new $transformer);

        return $transformation->toArray();
    }
}