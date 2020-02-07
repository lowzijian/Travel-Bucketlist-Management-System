<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelBucketCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_bucket_countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('capital');
            $table->integer('population');
            $table->string('flag');
            $table->string('currency');
            $table->string('region');
            $table->string('languages');
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
        Schema::dropIfExists('travel_bucket_countries');
    }
}
