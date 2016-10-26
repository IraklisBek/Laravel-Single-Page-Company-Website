<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function(Blueprint $table){
            $table->increments('id');
            $table->string('section_title');
            $table->string('section_secondary_title');
            $table->string('title');
            $table->string('member_image');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('linked_in_link');
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
        Schema::drop('team', function(Blueprint $table){
            $table->dropIfExists('team');
        });
    }
}
