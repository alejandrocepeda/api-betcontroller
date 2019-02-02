<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\EventStatus;
use App\Odd;
use App\Bet;
use App\Market;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Odd::truncate();
        Event::truncate();
        EventStatus::truncate();

        $this->Events();
        $this->EventStatus();
    }

    public function Odds($eventId)
    {

        $markets = Market::all();
        
        foreach($markets as $market){

            $bets = Bet::where('market_id','=',$market->id)->get();
           
            foreach($bets as $bet){
                Odd::create([
                    'event_id'      => $eventId,
                    'market_id'     => $market->id,
                    'bet_id'        => $bet->id,
                    'value'         => mt_rand(100, 600),
                    'special_value' => 0
                ]);
            }
        }
    }
    
    public function EventStatus(){

        $data = array(
            [
                'id'    => 1,
                'name'  => 'Open'
            ],
            [
                'id'    => 2,
                'name'  => 'Close'
            ],
            [
                'id'    => 3,
                'name'  => 'Inactive'
            ]
        );

        EventStatus::insert($data);
    }

    public function Events(){

        $datetime = Carbon::now()->addHour(5)->timestamp; 

        $event = Event::create([
            'id'                => 1,
            'name'              => 'Dallas Mavericks - Toronto Raptors',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 2
        ]);

        $this->Odds($event->id);

        $event = Event::create([
            'id'                => 2,
            'name'              => 'Los Angeles Dodgers - Houston Astros',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 3
        ]);
        $this->Odds($event->id);

        $event = Event::create([
            'id'                => 3,
            'name'              => 'Aiginiakos FC - Doxa Dramas FC',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 1
        ]);
        $this->Odds($event->id);

        $event = Event::create([
            'id'                => 4,
            'name'              => 'Alashkert - Banants Yerevan FC',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 1
        ]);
        $this->Odds($event->id);

        $event = Event::create([
            'id'                => 5,
            'name'              => 'Argentinos Jrs - CA Talleres',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 1
        ]);
        $this->Odds($event->id);

        $event = Event::create([
            'id'                => 6,
            'name'              => 'CA Platense - Club Olimpo',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 1
        ]);
        $this->Odds($event->id);

        $event = Event::create([
            'id'                => 7,
            'name'              => 'CA San Lorenzo - CA Huracan',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 1
        ]);
        $this->Odds($event->id);

        $event = Event::create([
            'id'                => 8,
            'name'              => 'Cagliari Calcio - FC Torino',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 1
        ]);
        $this->Odds($event->id);

        $event = Event::create([
            'id'                => 9,
            'name'              => 'Central Coast Mariners FC - Sydney FC',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 1
        ]);
        $this->Odds($event->id);

        $event = Event::create([
            'id'                => 10,
            'name'              => 'Cholet Basket - Antibes Sharks',
            'event_status_id'   => 1,
            'date_time'         => $datetime,
            'league_id'         => 1
        ]);
        $this->Odds($event->id);
    }
}
