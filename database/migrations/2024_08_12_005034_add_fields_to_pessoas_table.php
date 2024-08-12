<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pessoas', function (Blueprint $table) {
            $table->string('nomeMae')->nullable();
            $table->string('nomePai')->nullable();
            $table->string('cpf')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pessoas', function (Blueprint $table) {
            $table->dropIndex('nomeMae')->nullable();
            $table->dropIndex('nomePai')->nullable();
            $table->dropIndex('cpf')->unique();
        });
    }
};
