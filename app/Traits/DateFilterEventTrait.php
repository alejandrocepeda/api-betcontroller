<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

trait DateFilterEventTrait{

    protected function setDateFilterEvent($model){

        $query = $model::query();
        
         if (request()->has('dateFilter')) {
           
            $dateFilters = collect(
                [
                    'today'        => Carbon::now(),
                    'tomorrow'     => Carbon::tomorrow(),
                    'yesterday'    => Carbon::yesterday()
                ]
            );
            
            if ($datetime = $dateFilters->get(request()->dateFilter)){
                $query->whereRaw("DATE(date_time) = ?",$datetime->format('Y-m-d'));
            }
        }

        return $query;
    }
}