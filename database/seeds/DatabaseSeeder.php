<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {           
        $this->call(BetSeeder::class);
        $this->call(MarketSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(LeagueSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(SportSeeder::class);
        $this->call(BookmakerSeeder::class);
    }

}
