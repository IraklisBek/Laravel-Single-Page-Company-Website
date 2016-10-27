<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_task', function(Blueprint $table){
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('team_task', function(Blueprint $table){
            $table->foreign('team_id')->references('id')->on('team');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_task');
    }
}
