<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelo1Table extends Migration
{
    public function up()
    {
        Schema::create('modelo1s', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modelo1s');
    }
}
