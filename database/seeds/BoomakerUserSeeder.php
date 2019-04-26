<?php

use Illuminate\Database\Seeder;
use App\BookmakerUser;


class BoomakerUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        
        BookmakerUser::truncate(); 
        $this->BookmakerUser();
      
    }

    public function BookmakerUser()
    {
        
        BookmakerUser::create([
            'bookmaker_id'  => 1,
            'user_id'       => 1
        ]);
    }
    
    
}
