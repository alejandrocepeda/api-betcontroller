<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsOddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_odds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('market_id');
            $table->integer('odd_id');
            $table->double('value', 8, 2)->default(0);;
            $table->double('special_value',8,2)->default(0);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_odds');
    }
}
