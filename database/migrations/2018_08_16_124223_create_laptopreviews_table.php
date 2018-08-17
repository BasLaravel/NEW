<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaptopReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptop_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('laptop_id');
            $table->unsignedInteger('user_id');
            $table->boolean('aanrader');
            $table->unsignedInteger('bedieningsgemak');
            $table->unsignedInteger('gebruiksvriendelijkheid');
            $table->unsignedInteger('snelheid');
            $table->unsignedInteger('mogelijkheid');
            $table->string('positieve_feedback_1')->nullable();
            $table->string('negatieve_feedback_1')->nullable();;
            $table->string('positieve_feedback_2')->nullable();;
            $table->string('negatieve_feedback_2')->nullable();;
            $table->string('positieve_feedback_3')->nullable();;
            $table->string('negatieve_feedback_3')->nullable();;
            $table->longText('mening')->nullable();
            $table->string('naam')->nullable();;
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
        Schema::dropIfExists('reviews');
    }
}
