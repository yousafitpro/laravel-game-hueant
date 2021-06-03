<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('admin');
            $table->string('win1');
            $table->string('win2');
            $table->string('win3');
            $table->string('win4');
            $table->string('win5');
            $table->string('sec_win');
            $table->string('tournament_id');
            $table->string('sec_win_count');
            $table->string('sec_win_max_amt');
            $table->string('min_withdraw_amt');
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
        Schema::dropIfExists('lotteries');
    }
}
