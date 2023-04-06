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
        Schema::create('rendezvenyek', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('helyszin')->nullable();
            $table->timestamp('idopont')->nullable();
            $table->json('kepek')->nullable();
            $table->text('leiras')->nullable();
            $table->string('tipus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvenyek');
    }
};
