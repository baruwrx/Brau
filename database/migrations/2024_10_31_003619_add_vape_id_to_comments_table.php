<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVapeIdToCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('vape_id')->after('id'); 
            $table->foreign('vape_id')->references('id')->on('vapes')->onDelete('cascade'); 
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['vape_id']); 
            $table->dropColumn('vape_id'); 
        });
    }
}
