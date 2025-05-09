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
    Schema::create('guests', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('institution')->nullable();
        $table->string('purpose');
        $table->string('contact')->nullable();
        $table->timestamp('visited_at')->default(now());
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
