<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeChangesToTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team', function (Blueprint $table) {
            /*$table->dropColumn('section_title');
            $table->dropColumn('section_secondary_title');
            $table->renameColumn('title', 'name');
            $table->string('profession');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team', function (Blueprint $table) {
            /*$table->string('section_title');
            $table->string('section_secondary_title');
            $table->renameColumn('name', 'title');
            $table->dropColumn('profession');*/
        });
    }
}
