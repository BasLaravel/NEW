<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesktopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desktops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categorie');
            $table->bigInteger('product_id')->unique();
            $table->bigInteger('ean')->unique();
            $table->mediumText('title');
            $table->double('price', 8, 2);
            $table->string('specsTag');
            $table->string('processor');
            $table->longText('short_description');
            $table->longText('long_description');
            $table->string('image_large')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE desktops ADD FULLTEXT fulltext_index (title, short_description)');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desktops');
    }
}
