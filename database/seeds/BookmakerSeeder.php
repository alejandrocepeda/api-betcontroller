<?php

use Illuminate\Database\Seeder;
use App\Bookmaker;
use App\BookmakerStatus;


class BookmakerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        
        BookmakerStatus::truncate();
        Bookmaker::truncate();
       
        $this->Bookmakers();
        $this->BookmakerStatus();
    }

    public function Bookmakers()
    {
        
        Bookmaker::create([
            'id'                    => 1,
            'name'                  => 'Bookmaker 1',
            'bookmaker_status_id'   => 1
        ]);

        Bookmaker::create([
            'id'                    => 2,
            'name'                  => 'Bookmaker 2',
            'bookmaker_status_id'   => 1
        ]);
    }
    
    public function BookmakerStatus()
    {
        
        BookmakerStatus::create([
            'id'        => 1,
            'name'     => 'Active'
        ]);

        BookmakerStatus::create([
            'id'        => 2,
            'name'     => 'Inactive'
        ]);
    }
}
