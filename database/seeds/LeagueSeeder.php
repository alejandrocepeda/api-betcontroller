<?php

use Illuminate\Database\Seeder;
use App\League;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        League::truncate();
        $this->Leagues();
    }

    public function Leagues()
    {

        League::create([
            'id'            => 1,
            'sport_id'      => 1,
            'location_id'   => 2,
            'name'          => 'Premier League'
        ]);

        League::create([
            'id'            => 2,
            'sport_id'      => 3,
            'location_id'   => 1,
            'name'          => 'NBA'
        ]);

        League::create([
            'id'            => 3,
            'sport_id'      => 5,
            'location_id'   => 1,
            'name'          => 'MLB'
        ]);
    }
}
