<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiversTables extends Migration
{
    public function up()
    {
      Schema::create('areas', function(Blueprint $table) {
        $table->increments('id');

        $table->string('name');
      });

      Schema::create('receivers', function(Blueprint $table) {
        $table->increments('id');

        $table->string('cnpj')->unique();
        $table->string('name');
        $table->string('email');
        $table->string('password');

        $table->boolean('showin')->default(false);

        $table->timestamps();
      });


      Schema::create('points', function(Blueprint $table) {
        $table->increments('id');

        $table->integer('receiver_id');

        $table->string('code')->nullable();
        $table->string('description')->nullable();
        $table->string('latitude')->nullable();
        $table->string('longitude')->nullable();

        $table->timestamps();

        $table->foreign('receiver_id')->references('id')->on('receivers');
      });

      Schema::create('area_point', function(Blueprint $table){
        $table->increments('id');

        $table->integer('point_id');
        $table->integer('area_id');

        $table->foreign('point_id')->references('id')->on('points');
        $table->foreign('area_id')->references('id')->on('areas');
      });
    }

    public function down()
    {
      Schema::dropIfExists('receivers');
      Schema::dropIfExists('areas');
      Schema::dropIfExists('area_receiver');
      Schema::dropIfExists('point_receiver');
    }
}
