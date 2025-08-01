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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('number')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('rolename');
            $table->rememberToken();
            $table->integer('status')->default(1);
            $table->string('image')->nullable();
            $table->string('otp')->nullable();
            $table->timestamp('otp_expiry')->nullable();
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
