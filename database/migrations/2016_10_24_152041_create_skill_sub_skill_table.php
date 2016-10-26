<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillSubSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_sub_skill', function(Blueprint $table){
            $table->increments('id');
            $table->integer('skill_id')->unsigned();
            $table->integer('sub_skill_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('skill_sub_skill', function(Blueprint $table){
            $table->foreign('skill_id')->references('id')->on('skills');
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
        Schema::dropIfExists('skill_sub_skill');
    }
}
