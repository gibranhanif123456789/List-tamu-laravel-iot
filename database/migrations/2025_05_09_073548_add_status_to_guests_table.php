<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->string('status')->default('Belum diproses')->after('created_at');
        });
    }
    
    public function down()
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
};
