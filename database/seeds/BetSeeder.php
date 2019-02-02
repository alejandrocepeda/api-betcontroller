<?php

use Illuminate\Database\Seeder;
use App\Bet;

class BetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bet::truncate();
        $this->Bets();
    }

    public function Bets()
    {
        
        Bet::create([
            'id'            => 1,
            'name'          => '1',
            'market_id'     => 1
        ]);

        Bet::create([
            'id'            => 2,
            'name'          => 'X',
            'market_id'     => 1
        ]);

        Bet::create([
            'id'            => 3,
            'name'          => '2',
            'market_id'     => 1
        ]);

        Bet::create([
            'id'            => 4,
            'name'          => '1',
            'market_id'     => 2
        ]);

        Bet::create([
            'id'            => 5,
            'name'          => 'X',
            'market_id'     => 2
        ]);

        Bet::create([
            'id'            => 6,
            'name'          => '2',
            'market_id'     => 2
        ]);


        Bet::create([
            'id'            => 7,
            'name'          => '0:0',
            'market_id'     => 5
        ]);

        Bet::create([
            'id'            => 8,
            'name'          => '0:1',
            'market_id'     => 5
        ]);
        
        Bet::create([
            'id'            => 9,
            'name'          => '0:2',
            'market_id'     => 5
        ]);

        Bet::create([
            'id'            => 10,
            'name'          => '0:3',
            'market_id'     => 5
        ]);

        Bet::create([
            'id'            => 11,
            'name'          => '0:4',
            'market_id'     => 5
        ]);
        
        Bet::create([
            'id'            => 12,
            'name'          => '1:0',
            'market_id'     => 5
        ]);

        Bet::create([
            'id'            => 13,
            'name'          => '1:1',
            'market_id'     => 5
        ]);

        Bet::create([
            'id'            => 14,
            'name'          => '1:2',
            'market_id'     => 5
        ]);

        Bet::create([
            'id'            => 15,
            'name'          => '1:3',
            'market_id'     => 5
        ]);

        Bet::create([
            'id'            => 16,
            'name'          => '1:4',
            'market_id'     => 5
        ]);


        Bet::create([
            'id'            => 17,
            'name'          => 'Over(0.5)',
            'market_id'     => 6
        ]);

        Bet::create([
            'id'            => 18,
            'name'          => 'Under(0.5)',
            'market_id'     => 6
        ]);

        Bet::create([
            'id'            => 19,
            'name'          => '1 1G',
            'market_id'     => 7
        ]);

        Bet::create([
            'id'            => 20,
            'name'          => '2 1G',
            'market_id'     => 7
        ]);
    }
}
