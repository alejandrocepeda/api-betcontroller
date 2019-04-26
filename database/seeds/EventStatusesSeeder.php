<?php

use Illuminate\Database\Seeder;

use App\EventStatus;


class EventStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
      
        EventStatus::truncate();

      
        $this->EventStatus();
    }
    
    public function EventStatus(){

        $data = array(
            [
                'id'    => 1,
                'name'  => 'Active'
            ],
            [
                'id'    => 2,
                'name'  => 'Inactive'
            ]
        );

        EventStatus::insert($data);
    }
}
