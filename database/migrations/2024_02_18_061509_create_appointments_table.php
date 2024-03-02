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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_id')->constrained('medicals');
            $table->string('slip_no')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('pass_number')->nullable();
            $table->date('pass_issue_date')->nullable();
            $table->string('pass_issue_place')->nullable();
            $table->date('pass_expiry_date')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('email_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('national_id')->nullable();
            $table->string('position')->nullable();
            $table->string('other')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
