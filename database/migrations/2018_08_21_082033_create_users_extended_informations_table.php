<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersExtendedInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_extended_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id')->length(10)->unsigned();
            $table->enum('aanhef', ['dhr', 'mevr']);
            $table->string('voor_naam', 20);
            $table->string('tussenvoegsel', 10);
            $table->string('achter_naam', 60);
            $table->string('straat_naam', 70);
            $table->string('straat_nummer', 10);
            $table->string('postcode', 6);
            $table->string('plaats_naam', 70);
            $table->string('land', 70);
            $table->date('geboorte_datum')->nullable();
            $table->tinyInteger('leeftijd')->nullable();
            $table->integer('telefoonnummer')->nullable();
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
        Schema::dropIfExists('users_extended_informations');
    }
}
