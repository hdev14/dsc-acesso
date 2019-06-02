<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login', 50);
            $table->string('senha', 60);
            $table->string('nome', 200);
            $table->string('cpf', 11);
            $table->string('tipo_acesso', 3);
            $table->boolean('ativo', 1);
            $table->string('token', 255)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->timestamp('last_access')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
