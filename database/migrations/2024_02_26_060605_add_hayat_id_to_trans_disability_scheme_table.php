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
        Schema::table('trans_disability_scheme', function (Blueprint $table) {
            $table->foreignId('hayat_id')->constrained('hayticha_form');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trans_disability_scheme', function (Blueprint $table) {
            //
        });
    }
};