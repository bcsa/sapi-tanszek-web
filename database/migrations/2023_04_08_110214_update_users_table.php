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
        Schema::table('users', function($table) {
            $table->string('avatar')->nullable()->after('name');
            $table->string('leiras')->nullable()->after('name');
            $table->string('pozicio')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function($table) {
            $table->dropColumn('pozicio');
            $table->dropColumn('leiras');
            $table->dropColumn('avatar');
        });
    }
};
