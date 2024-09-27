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
        Schema::create('offer_discount', function (Blueprint $table) {
            $table->id();
            $table->string('Pro_id');
            $table->string('Pro_name');
            $table->string('Pro_price');
            $table->string('Offer_percentage');
            $table->string('Offer_price');
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_discount');
    }
};
