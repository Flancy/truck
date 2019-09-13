<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image');
            $table->string('weight');
            $table->string('price');
            $table->bigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');
            $table->unsignedBigInteger('autocategories_id')->nullable();
            $table->foreign('autocategories_id')->references('id')->on('autocategories')->onDelete('cascade');
            $table->timestamps();
        });

       Schema::table('auto', function($table) {
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       });

        Schema::table('auto', function ($table) {
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
        Schema::dropIfExists('auto');
    }
}
