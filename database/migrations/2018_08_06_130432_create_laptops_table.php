<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('product_id')->unique();
            $table->bigInteger('ean')->unique();
            $table->string('title');
            $table->double('price', 8, 2);

                //in de toekomst bijvoegen:
            // $table->mediumInteger('prijs');
            // $table->mediumInteger('levertijd');
            // $table->boolean('leverbaar');
            
            
            $table->string('specsTag');
            $table->string('screen_diameter');
            $table->string('processor');


            $table->longText('short_description');
            $table->longText('long_description');
            $table->string('image_large')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->timestamps();
        });

        //DB::statement('ALTER TABLE laptops ADD FULLTEXT(title, short_description)');
        DB::statement('ALTER TABLE laptops ADD FULLTEXT fulltext_index (title, short_description)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}
