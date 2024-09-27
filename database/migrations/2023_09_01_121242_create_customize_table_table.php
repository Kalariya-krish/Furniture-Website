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
        Schema::create('customize_table', function (Blueprint $table) {
            $table->id();
            $table->string('Table_type');
            $table->string('Table_shape');
            $table->string('Table_material');
            $table->integer('Table_seating');
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
        Schema::dropIfExists('customize_table');
    }
};
