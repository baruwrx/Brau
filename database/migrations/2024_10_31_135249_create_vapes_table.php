<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVapesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('vapes')) {
            // Crea la tabla solo si no existe
            Schema::create('vapes', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->decimal('price', 8, 2);
                $table->integer('stock');
                $table->foreignId('category_id')->constrained();
                $table->timestamps();
            });
        } else {
            // Agrega las columnas necesarias si la tabla ya existe
            Schema::table('vapes', function (Blueprint $table) {
                if (!Schema::hasColumn('vapes', 'category_id')) {
                    $table->foreignId('category_id')->constrained();
                }
            });
        }
    }

    public function down()
    {
    
    }
}
