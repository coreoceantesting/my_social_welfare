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
        Schema::table('users', function (Blueprint $table) {
            $table->string('f_name')->after('password');
            $table->string('m_name')->after('f_name');
            $table->string('l_name')->after('m_name');
            $table->string('gender')->after('l_name');
            $table->string('dob')->after('gender');
            $table->string('Age')->after('dob');
            $table->string('father_fname')->after('Age');
            $table->string('father_mname')->after('father_fname');
            $table->string('father_lname')->after('father_mname');
            $table->string('mother_name')->after('father_lname');
            $table->string('category')->after('mother_name');
            $table->string('contact')->after('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('f_name');
            $table->dropColumn('m_name');
            $table->dropColumn('l_name');
            $table->dropColumn('gender');
            $table->dropColumn('dob');
            $table->dropColumn('Age');
            $table->dropColumn('father_fname');
            $table->dropColumn('father_mname');
            $table->dropColumn('father_lname');
            $table->dropColumn('mother_name');
            $table->dropColumn('category');
            $table->dropColumn('contact');
        });
    }
};
