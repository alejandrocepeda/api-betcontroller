<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::truncate();
        $this->Locations();
    }

    public function Locations()
    {
        
        Location::create([
            'id'        => 1,
            'name'     => 'USA',
            'image'    => 'http://img.servicecdn.com/images/flags/statiuniti.png',
        ]);
        
        Location::create([
            'id'        => 2,
            'name'     => 'England',
            'image'    => 'http://img.servicecdn.com/images/flags/inghilterra.png',
        ]);

        Location::create([
            'id'        => 3,
            'name'     => 'Argentina',
            'image'    => 'http://img.servicecdn.com/images/flags/argentina.png',
        ]);

        Location::create([
            'id'        => 4,
            'name'     => 'France',
            'image'    => 'http://img.servicecdn.com/images/flags/francia.png',
        ]);

        Location::create([
            'id'        => 5,
            'name'     => 'Germany',
            'image'    => 'http://img.servicecdn.com/images/flags/germania.png',
        ]);
        
        Location::create([
            'id'        => 6,
            'name'     => 'Spain',
            'image'    => 'http://img.servicecdn.com/images/flags/spagna.png',
        ]);

        Location::create([
            'id'        => 7,
            'name'     => 'Italy',
            'image'    => 'http://img.servicecdn.com/images/flags/italia.png',
        ]);

        Location::create([
            'id'        => 8,
            'name'     => 'International',
            'image'    => 'http://img.servicecdn.com/images/flags/internazionale.png',
        ]);

        Location::create([
            'id'        => 9,
            'name'     => 'Russia',
            'image'    => 'http://img.servicecdn.com/images/flags/russia.png',
        ]);

        Location::create([
            'id'        => 10,
            'name'     => 'Portugal',
            'image'    => 'http://img.servicecdn.com/images/flags/portogallo.png',
        ]);
    }
}
