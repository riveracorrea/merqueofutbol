<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigincrements('id')->autoincrement();
            $table->bigInteger('game_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->integer('goles');
            $table->integer('amarillas');
            $table->integer('rojas');
            $table->integer('anfitrion'); 
            $table->integer('resultado');
            $table->integer('puntos');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
