<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonatorsTables extends Migration
{
    public function up()
    {
      Schema::create('donators', function(Blueprint $table) {
        $table->increments('id');

        $table->string('uid')->nullable();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');

        $table->timestamps();
      });

      Schema::create('donator_confirm', function(Blueprint $table) {
        $table->increments('id');

        $table->integer('donator_id');
        $table->string('code');
      });
    }

    public function down()
    {
      Schema::dropIfExists('donators');
    }
}
