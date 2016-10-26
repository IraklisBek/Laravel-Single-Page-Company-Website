<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function(Blueprint $table){
            $table->increments('id');
            $table->string('logo_image');
            $table->string('company_name');
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('something_link')->nullable();
            $table->string('linked_in_link')->nullable();
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
        Schema::create('home', function(Blueprint $table){
            $table->drop('home');
        });
    }
}
