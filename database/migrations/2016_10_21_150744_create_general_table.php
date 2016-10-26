<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function(Blueprint $table){
            $table->increments('id');
            $table->string('logo_image');
            $table->string('company_name');
            $table->string('company_facebook');
            $table->string('company_twitter');
            $table->string('company_linked_in');
            $table->string('company_something');
            $table->string('services_title');
            $table->string('services_secondary_title');
            $table->string('portfolio_title');
            $table->string('portfolio_secondary_title');
            $table->string('team_title');
            $table->string('team_secondary_title');
            $table->string('contact_title');
            $table->string('contact_secondary_title');
            $table->text('contact_body');
            $table->string('company_phone');
            $table->string('company_email');
            $table->string('company_address');
            $table->string('company_lat');
            $table->string('company_lng');

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
        Schema::drop('generals', function(Blueprint $table){
            $table->drop();
        });
    }
}
