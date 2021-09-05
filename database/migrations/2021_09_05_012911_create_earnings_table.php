<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->string('scholar_id')->index();
            $table->dateTime('last_claim_date');
            $table->dateTime('next_claim_date');
            $table->unsignedInteger('last_claimed_slp');
            $table->unsignedInteger('ronin_slp');
            $table->unsignedInteger('in_game_slp');
            $table->unsignedInteger('mmr');
            $table->unsignedInteger('rank');
            $table->timestamp('created_at');

            $table->foreign('scholar_id')->references('id')->on('scholars');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('earnings');
    }
}
