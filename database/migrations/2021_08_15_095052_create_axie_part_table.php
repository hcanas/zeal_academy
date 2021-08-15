<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAxiePartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('axie_part', function (Blueprint $table) {
            $table->unsignedBigInteger('axie_id');
            $table->unsignedBigInteger('part_id');

            $table->primary(['axie_id', 'part_id']);
            $table->foreign('axie_id')->references('id')->on('axies');
            $table->foreign('part_id')->references('id')->on('parts');
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
        Schema::dropIfExists('axie_part');
    }
}
