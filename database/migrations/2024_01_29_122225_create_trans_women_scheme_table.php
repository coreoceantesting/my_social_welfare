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
        Schema::create('trans_women_scheme', function (Blueprint $table) {
            $table->id();
            $table->string('application_no')->unique();
            $table->foreignId('ward_id')->constrained('wards');
            $table->string('full_name')->nullable();
            $table->string('full_address')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('contact')->nullable();
            $table->string('adhaar_no')->nullable();
            $table->string('duration_of_residence')->nullable();
            $table->string('details')->nullable();
            $table->integer('status')->comment('0 => pending, 1 => approve, 2 => reject')->default(0);
            $table->integer('hod_status')->comment('0 => pending, 1 => approve, 2 => reject')->default(0);
            $table->integer('ac_status')->comment('0 => pending, 1 => approve, 2 => reject')->default(0);
            $table->integer('amc_status')->comment('0 => pending, 1 => approve, 2 => reject')->default(0);
            $table->integer('dmc_status')->comment('0 => pending, 1 => approve, 2 => reject')->default(0);
            $table->unsignedBigInteger('approve_by_hod')->nullable();
            $table->string('hod_approval_date')->nullable();
            $table->unsignedBigInteger('approve_by_ac')->nullable();
            $table->string('ac_approval_date')->nullable();
            $table->unsignedBigInteger('approve_by_amc')->nullable();
            $table->string('amc_approval_date')->nullable();
            $table->unsignedBigInteger('approve_by_dmc')->nullable();
            $table->string('dmc_approval_date')->nullable();
            $table->string('hod_reject_reason')->nullable();
            $table->unsignedBigInteger('reject_by_hod')->nullable();
            $table->string('hod_reject_date')->nullable();
            $table->string('ac_reject_reason')->nullable();
            $table->unsignedBigInteger('reject_by_ac')->nullable();
            $table->string('ac_reject_date')->nullable();
            $table->string('amc_reject_reason')->nullable();
            $table->unsignedBigInteger('reject_by_amc')->nullable();
            $table->string('amc_reject_date')->nullable();
            $table->string('dmc_reject_reason')->nullable();
            $table->unsignedBigInteger('reject_by_dmc')->nullable();
            $table->string('dmc_reject_date')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_women_scheme');
    }
};