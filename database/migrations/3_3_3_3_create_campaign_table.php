<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign', function (Blueprint $table) {
            $table->increments('campaignid');
            $table->integer('organizationid')->unsigned();
            $table->string('name');
            $table->dateTime('startdate');
            $table->dateTime('enddate');
            $table->integer('emailid');

            $table->foreign('organizationid')->references('organizationid')->on('organization');
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
        Schema::dropIfExists('campaign');
    }
}
