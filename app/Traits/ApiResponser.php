<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

trait ApiResponser{

    protected function successResponse($data,$code){
        return response()->json($data,$code);
    }

    protected function errorResponse($mesaage,$code){
        return response()->json(['error' => $mesaage,'code' => $code],$code);
    }

    public function paginate(Collection $collection){
        if (request()->has('pagination') && 'true' == request()->pagination){
            
            $rules = ['per_page' => 'integer|min:2|max:100'];
            Validator::validate(request()->all(), $rules);
            $perPage        = (request()->has('per_page') ? request()->per_page : 5);
            $page           = LengthAwarePaginator::resolveCurrentPage();
            $offset         = (($page-1)*$perPage);

            $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();

            $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, 
                [
                    'path'  => LengthAwarePaginator::resolveCurrentPath()
                ]
            );
            
            $paginated->appends(request()->all());

            return $paginated;
        }
        
        return $collection;
    }

    protected function showAll(Collection $collection,$code = 200){

        if ($collection->isEmpty()){
            return $this->successResponse(['data' => $collection],$code);
        }
        
        $collection =  $this->paginate($collection);

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