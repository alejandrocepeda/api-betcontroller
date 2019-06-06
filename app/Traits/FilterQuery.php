<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait FilterQuery{

    protected function search_data($collection){        

        if (request()->has('search') && !empty(request()->search)) {
            
            $this->value = request()->search;

            if (!$collection->isEmpty()) {
                
                $search = $this->value;

                return $collection->filter(function($item) use ($search){
                    return (stristr($item->name,$search));
                });
                
                // refactorizar para App/Model
                // solo esta funcionando para Collection
                
                //dd($collection);
                /*
                $collection = $collection->filter(function($item,$key) use ($search){
                      
                    foreach ($item as $name => $info) {                             
                        
                        if (stristr($info,$search)){
                            return $item; 
                        }
                    }
                    

                });
                */
                

                //$collection = collect($collection->search($search));
                    
            }

            return $collection;
        }

        return $collection;
    }
}