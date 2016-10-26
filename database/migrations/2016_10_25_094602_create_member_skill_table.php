<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_skill_team', function(Blueprint $table){
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('sub_skill_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('sub_skill_team', function(Blueprint $table){
            $table->foreign('team_id')->references('id')->on('team');
            $table->foreign('sub_skill_id')->references('id')->on('sub_skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_skill_team');
    }
}
