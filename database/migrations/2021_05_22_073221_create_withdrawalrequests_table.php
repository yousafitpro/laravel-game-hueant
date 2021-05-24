<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawalrequests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('wallet_amount');
            $table->string('requested_amount');
            $table->string('status');
            $table->string('date');
            $table->string('completed_date');
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
        Schema::dropIfExists('withdrawalrequests');
    }
}
