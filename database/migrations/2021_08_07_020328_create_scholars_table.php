<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholars', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->unsignedDecimal('share', 5, 2);
            $table->string('relationship');
            $table->dateTime('last_claim_date');
            $table->dateTime('next_claim_date');
            $table->unsignedInteger('last_claimed_slp');
            $table->unsignedInteger('ronin_slp');
            $table->unsignedInteger('in_game_slp');
            $table->unsignedInteger('mmr');
            $table->unsignedInteger('rank');
            $table->timestamps();

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
        Schema::dropIfExists('scholars');
    }
}
