<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('players', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('nombres');
            $table->string('nacionalidad');
            $table->string('edad');
            $table->string('posicion');
            $table->string('nrocamiseta');
            $table->string('foto');
            $table->bigInteger('team_id')->unsigned();
        });
    }
     
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
