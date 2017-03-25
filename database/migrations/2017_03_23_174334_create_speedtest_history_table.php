<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeedtestHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speedtest_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sponsor');
            $table->string('location');
            $table->integer('ping');
            $table->decimal('download', 5, 2);
            $table->decimal('upload', 5, 2);
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
        Schema::dropIfExists('speedtest_history');
    }
}
