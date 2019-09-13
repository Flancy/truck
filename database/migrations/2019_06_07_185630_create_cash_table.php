<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('balance')->default(1000);
            $table->bigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('cash', function ($table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash');
    }
}
