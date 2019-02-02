<?php

use Illuminate\Database\Seeder;
use App\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sport::truncate();
        $this->Sports();
    }

    public function Sports()
    {
        
        Sport::create([
            'id'        => 1,
            'name'      => 'Soccer'
        ]);

        Sport::create([
            'id'        => 2,
            'name'      => 'Tennis'
        ]);
        
        Sport::create([
            'id'        => 3,
            'name'      => 'Basketball'
        ]);
        
        Sport::create([
            'id'        => 4,
            'name'      => 'Ice Hockey'
        ]);

        Sport::create([
            'id'        => 5,
            'name'      => 'BaseBall'
        ]);

        Sport::create([
            'id'        => 6,
            'name'      => 'American Football'
        ]);

        Sport::create([
            'id'        => 7,
            'name'      => 'Golf'
        ]);
        
        Sport::create([
            'id'        => 8,
            'name'      => 'Boxing'
        ]);

        Sport::create([
            'id'        => 9,
            'name'      => 'MMA'
        ]);

        Sport::create([
            'id'        => 10,
            'name'      => 'Rugby'
        ]);

    }
}
