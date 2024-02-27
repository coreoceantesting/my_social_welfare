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
        Schema::table('hayticha_form', function (Blueprint $table) {
            $table->string('sign_uploaded_live_certificate')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hayticha_form', function (Blueprint $table) {
            $table->dropColumn('sign_uploaded_live_certificate');
        });
    }
};