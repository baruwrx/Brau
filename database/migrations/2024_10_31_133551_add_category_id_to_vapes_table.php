<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('vapes', function (Blueprint $table) {
            if (!Schema::hasColumn('vapes', 'category_id')) {
                $table->foreignId('category_id')->constrained()->after('stock');
            }
        });
    }

    public function down()
    {
        Schema::table('vapes', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};

