<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ordens', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('hora_inicio');
            $table->string('hora_termino');
            $table->string('tipo');
            $table->string('hora_parada');
            $table->string('hora_arranque');
            $table->string('requerimiento');
            $table->string('equipo');
            $table->text('descripcion');
            $table->string('codigo');
            $table->string('numero_orden');
            $table->string('estado');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('tienda_id')->unsigned();
            $table->foreign('tienda_id')->references('id')->on('tiendas');
            
            $table->timestamps();
        });

        Schema::create('orden_causa', function (Blueprint $table) {
            $table->integer('orden_id')->unsigned();
            $table->foreign('orden_id')->references('id')->on('ordens');
            $table->integer('causa_id')->unsigned();
            $table->foreign('causa_id')->references('id')->on('causas');
        });

        Schema::create('orden_tipo', function (Blueprint $table) {
            $table->integer('orden_id')->unsigned();
            $table->foreign('orden_id')->references('id')->on('ordens');
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiendas');
        Schema::dropIfExists('ordens');
    }
}
