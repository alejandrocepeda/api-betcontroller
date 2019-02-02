<?php

use Illuminate\Database\Seeder;
use App\Market;
use App\MarketStatus;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MarketStatus::truncate();
        Market::truncate();

        $this->Markets();
        $this->MarketStatus();
    }

    public function MarketStatus()
    {
        $data = array(
            [
                'id'        => 1,
                'name'     => 'Active'
            ],
            [
                'id'        => 2,
                'name'     => 'Inactive'
            ],
        );

        MarketStatus::insert($data);
    }

    public function Markets()
    {

        $data = array(
            [
                'id'                => 1,
                'name'              => '1X2',
                'market_status_id'  => 1
            ],
            [
                'id'                => 2,
                'name'              => '1st Half Result',
                'market_status_id'  => 1
            ],
            [
                'id'                => 3,
                'name'              => '1st Half Under/Over',
                'market_status_id'  => 1
            ],
            [
                'id'                => 4,
                'name'              => 'Handicap',
                'market_status_id'  => 1
            ],
            [
                'id'                => 5,
                'name'              => 'Correct Score',
                'market_status_id'  => 1
            ],
            [
                'id'                => 6,
                'name'              => 'Over/Under',
                'market_status_id'  => 1
            ],
            [
                'id'                => 7,
                'name'              => 'First Goal',
                'market_status_id'  => 1
            ]
        );

        Market::insert($data);
    }
}
