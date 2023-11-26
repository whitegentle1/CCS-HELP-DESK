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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('course');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('section')->nullable()->default('---');
            $table->string('birthday')->nullable()->default('---');
            $table->string('contact')->nullable()->default('---');
            $table->string('address')->nullable()->default('---');
            $table->string('province')->nullable()->default('---');
            $table->string('city')->nullable()->default('---');
            $table->string('barangay')->nullable()->default('---');
            $table->string('zip')->nullable()->default('---');
            $table->string('profilepicture')->nullable()->default('https://pbs.twimg.com/profile_images/1723312302076858368/xE8Cxs4i_400x400.jpg');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
