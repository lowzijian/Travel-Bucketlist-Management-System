<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelBucketItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_bucket_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('country_id');
            $table->string('title');
            $table->string('caption');
            $table->text('description');
            $table->string('city');
            $table->text('photos');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('travel_bucket_items');
    }
}
