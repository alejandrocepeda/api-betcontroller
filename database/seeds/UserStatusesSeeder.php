<?php

use Illuminate\Database\Seeder;

use App\UserStatus;


class UserStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
      
        UserStatus::truncate();

      
        $this->UserStatus();
    }
    
    public function UserStatus(){

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

        UserStatus::insert($data);
    }
}
