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
        
        $data = array(
            [
                'id'            => 1,
                'name'          => '1',
                'market_id'     => 1,
                'description'   => '[Team1] will win'
            ],
            [
                'id'            => 2,
                'name'          => 'X',
                'market_id'     => 1,
                'description'   => '[Team1] - [Team2] will end in a draw'
            ],
            [
                'id'            => 3,
                'name'          => '2',
                'market_id'     => 1,
                'description'   => '[Team2] will win'
            ],
            [
                'id'            => 4,
                'name'          => '1 HT',
                'market_id'     => 2,
                'description'   => 'First half: [Team1] will win'
            ],
            [
                'id'            => 5,
                'name'          => 'X HT',
                'market_id'     => 2,
                'description'   => 'First half: it will end in a draw'
            ],
            [
                'id'            => 6,
                'name'          => '2 HT',
                'market_id'     => 2,
                'description'   => 'First half: [Team2] will win'
            ],
            [
                'id'            => 7,
                'name'          => '0:0',
                'market_id'     => 5,
                'description'   => 'The match will end 0:0'
            ],
            [
                'id'            => 8,
                'name'          => '0:1',
                'market_id'     => 5,
                'description'   => '[Team2] will win 0:1'
            ],
            [
                'id'            => 9,
                'name'          => '0:2',
                'market_id'     => 5,
                'description'   => '[Team2] will win 0:2'
            ],
            [
                'id'            => 10,
                'name'          => '0:3',
                'market_id'     => 5,
                'description'   => '[Team2] will win 0:3'
            ],
            [
                'id'            => 11,
                'name'          => '0:4',
                'market_id'     => 5,
                'description'   => '[Team2] will win 0:4'
            ],
            [
                'id'            => 12,
                'name'          => '1:0',
                'market_id'     => 5,
                'description'   => '[Team1] will win 1:0'
            ],
            [
                'id'            => 13,
                'name'          => '1:1',
                'market_id'     => 5,
                'description'   => 'The match will end 1:1'
            ],
            [
                'id'            => 14,
                'name'          => '1:2',
                'market_id'     => 5,
                'description'   => '[Team2] will win 1:2'
            ],
            [
                'id'            => 15,
                'name'          => '1:3',
                'market_id'     => 5,
                'description'   => '[Team2] will win 1:3'
            ],
            [
                'id'            => 16,
                'name'          => '1:4',
                'market_id'     => 5,
                'description'   => '[Team2] will win 1:4'
            ],
            [
                'id'            => 17,
                'name'          => 'Over(0.5)',
                'market_id'     => 6,
                'description'   => 'More than [HND] goals'
            ],
            [
                'id'            => 18,
                'name'          => 'Under(0.5)',
                'market_id'     => 6,
                'description'   => 'Less than [HND] goals'
            ],
            [
                'id'            => 19,
                'name'          => '1 1G',
                'market_id'     => 7,
                'description'   => 'First Goal [Team 1]'
            ],
            [
                'id'            => 20,
                'name'          => '2 1G',
                'market_id'     => 7,
                'description'   => 'First Goal [Team 1]'
            ],
            [
                'id'            => 21,
                'name'          => 'GG',
                'market_id'     => 10,
                'description'   => 'Both will score'
            ],
            [
                'id'            => 22,
                'name'          => 'NG',
                'market_id'     => 10,
                'description'   => 'At least one team no score'
            ],
            [
                'id'            => 23,
                'name'          => '1XDC',
                'market_id'     => 11,
                'description'   => '[Team1] will win or it will be a draw'
            ],
            [
                'id'            => 24,
                'name'          => '12DC',
                'market_id'     => 11,
                'description'   => '[Team1] or [Team2] will win'
            ],
            [
                'id'            => 25,
                'name'          => 'X2DC',
                'market_id'     => 11,
                'description'   => '[Team2] will win or it will be a draw'
            ],
            [
                'id'            => 26,
                'name'          => '1H',
                'market_id'     => 4,
                'description'   => '[Team1] will win considering the [HND] handicap (applied to the score of [Team1])'
            ],
            [
                'id'            => 27,
                'name'          => 'XH',
                'market_id'     => 4,
                'description'   => 'The match will end in a draw considering the [HND] handicap (applied to the score of [Team1])'
            ],
            [
                'id'            => 28,
                'name'          => '2H',
                'market_id'     => 4,
                'description'   => '[Team2] will win considering the [HND] handicap (applied to the score of [Team1])'
            ],
            [
                'id'            => 29,
                'name'          => '1+Ov 2H',
                'market_id'     => 12,
                'description'   => 'Second half: [Team1] will win and the number of goals will be more than [HND]'
            ],
            [
                'id'            => 30,
                'name'          => '1+Un 2H',
                'market_id'     => 12,
                'description'   => 'Second half: [Team1] will win and the number of goals will be less than [HND]'
            ],
            [
                'id'            => 31,
                'name'          => 'X+Ov 2H',
                'market_id'     => 12,
                'description'   => 'Second half: it will end in a draw and the number of goals will be more than [HND]'
            ],
            [
                'id'            => 32,
                'name'          => 'X+Un 2H',
                'market_id'     => 12,
                'description'   => 'Second half: it will end in a draw and the number of goals will be less than [HND]'
            ],
            [
                'id'            => 33,
                'name'          => '2+Ov 2H',
                'market_id'     => 12,
                'description'   => 'Second half: [Team2] will win and the number of goals will be more than [HND]'
            ],
            [
                'id'            => 34,
                'name'          => '2+Un 2H',
                'market_id'     => 12,
                'description'   => 'Second half: [Team2] will win and the number of goals will be less than [HND]'
            ],
            [
                'id'            => 35,
                'name'          => 'Odd',
                'market_id'     => 13,
                'description'   => 'The total number of goals will be odd'
            ],
            [
                'id'            => 36,
                'name'          => 'Even',
                'market_id'     => 13,
                'description'   => 'The total number of goals will be even'
            ],
            [
                'id'            => 37,
                'name'          => 'Odd HT',
                'market_id'     => 14,
                'description'   => 'First half: The total number of goals will be odd'
            ],
            [
                'id'            => 38,
                'name'          => 'Even H',
                'market_id'     => 14,
                'description'   => 'First half: The total number of goals will be even'
            ],
            [
                'id'            => 39,
                'name'          => 'Odd 2H',
                'market_id'     => 15,
                'description'   => 'Second half: The total number of goals will be odd'
            ],
            [
                'id'            => 40,
                'name'          => 'Even 2H',
                'market_id'     => 15,
                'description'   => 'Second half: The total number of goals will be even'
            ],
            [
                'id'            => 41,
                'name'          => '1X DC HT',
                'market_id'     => 16,
                'description'   => 'First half: [Team1] will win or it will be a draw'
            ],
            [
                'id'            => 42,
                'name'          => '12 DC HT',
                'market_id'     => 16,
                'description'   => 'First half: [Team1] or  [Team2] will win'
            ],
            [
                'id'            => 43,
                'name'          => 'X2 DC HT',
                'market_id'     => 16,
                'description'   => 'First half: [Team2] will win or it will be a draw'
            ]
            
        );

        Bet::insert($data);
    }
}
