<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::dropIfExists('users'); // Borrar la tabla si existe
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Aquí puedes dejarlo vacío o volver a crear la tabla si necesitas revertir la migración
    }
};

