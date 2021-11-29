<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('idlibro');
            $table->unsignedBigInteger('iduser');
            $table->unsignedBigInteger('idcategoria');
            $table->unsignedBigInteger('idautor');
            $table->string('titulolibro',100);
            $table->string('idiomalibro',25)->nullable();
            $table->string('descripcionlibro',75)->nullable();
            $table->timestamps();
            $table->foreign('idcategoria')->references('idcategoria')->on('categorias');
            $table->foreign('idautor')->references('idautor')->on('autores');
            $table->foreign('iduser')->references('id')->on('users');
            $table->unique(['titulolibro']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
