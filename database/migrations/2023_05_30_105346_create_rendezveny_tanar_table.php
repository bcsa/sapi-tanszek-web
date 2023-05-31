<?php

use App\Models\Rendezveny;
use App\Models\Tanar;
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
        Schema::create('rendezveny_tanar', function (Blueprint $table) {
            $table->foreignIdFor(Rendezveny::class)->constrained('rendezvenyek')->cascadeOnDelete();

            $table->foreignIdFor(Tanar::class)->constrained('tanarok')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezveny_tanar');
    }
};
