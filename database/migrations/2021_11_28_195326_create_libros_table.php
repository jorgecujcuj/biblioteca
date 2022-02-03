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
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->unsignedBigInteger('idcategoria');
            $table->unsignedBigInteger('idautor');
            $table->string('imglibro',100)->unique();
            $table->string('titulolibro',100)->unique();;
            $table->string('idiomalibro',25)->nullable();
            $table->string('descripcionlibro',75)->nullable();
            $table->timestamps();
            $table->foreign('idcategoria')->references('id')->on('categorias');
            $table->foreign('idautor')->references('id')->on('autores');
            $table->foreign('iduser')->references('id')->on('users');

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
