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
        Schema::create('trans_disability_scheme', function (Blueprint $table) {
            $table->id();
            $table->string('application_no')->unique();
            $table->string('ward_no')->nullable();
            $table->foreignId('ward_id')->constrained('wards');
            $table->string('full_name')->nullable();
            $table->string('full_address')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_address')->nullable();
            $table->string('contact')->nullable();
            $table->string('alternate_contact_no')->nullable();
            $table->string('type_of_disability')->nullable();
            $table->string('percentage');
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('ifsc_code');
            $table->string('authority_name')->nullable();
            $table->string('adhaar_no')->nullable();
            $table->string('profession')->nullable();
            $table->string('number_of_family')->nullable();
            $table->string('agriculture')->nullable();
            $table->string('personal_benefit')->nullable();
            $table->string('received_year')->nullable();
            $table->string('welfare_schemes')->nullable();
            $table->string('govt_scheme')->nullable();
            $table->string('poverty_number')->nullable();
            $table->string('caste')->nullable();
            $table->string('candidate_signature')->nullable();
            $table->string('passport_size_photo')->nullable();
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
            $table->string('dmc_sign')->nullable();
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
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disability_application');
    }
};