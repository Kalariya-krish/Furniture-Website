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
        Schema::create('customize_bed', function (Blueprint $table) {
            $table->id();
            $table->string('Bed_style');
            $table->string('Bed_size');
            $table->string('Bed_material');
            $table->string('Storage_opt');
            $table->string('Color');
            $table->string('Payment');
            $table->date('Ord_date');
            $table->date('Del_date');
            $table->string('Email');
            $table->integer('Quntity');
            $table->string('Demo_image')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customize_bed');
    }
};
