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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('First_name')->nullable(false);
            $table->string('Last_name')->nullable(false);
            $table->string('Mobile_no')->nullable(true);
            $table->string('Address')->nullable(true);
            $table->string('City')->nullable(true);
            $table->string('Pin_code')->nullable(true);
            $table->string('Bank_name')->nullable(true);
            $table->string('Account_no')->nullable(true);
            $table->string('Ifsc_code')->nullable(true);
            $table->string('Email')->uniqid();
            $table->string('Password')->nullable(false);
            $table->string('Profile_picture')->default("default.jpg");
            $table->string("Activation_token")->nullable(true);
            $table->string('Status')->default("Inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
