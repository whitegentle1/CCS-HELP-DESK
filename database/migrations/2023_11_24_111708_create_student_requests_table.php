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
        Schema::create('student_requests', function (Blueprint $table) {
            $table->id();
            $table->string('payment_session_id')->nullable;
            $table->string('user_session_id')->nullable;
            $table->string('fullname');
            $table->string('email');
            $table->string('student_id');
            $table->string('year_section');
            $table->string('document');
            $table->unsignedInteger('no_copy');
            $table->string('payment_method');
            $table->string('amount');
            $table->string('activity')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_request');
    }
};
