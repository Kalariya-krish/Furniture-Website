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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string("Pro_id")->nullable(false);
            $table->string("Payment")->nullable(false);
            $table->date("Ord_data")->nullable(false);
            $table->date("Del_data")->nullable(false);
            $table->string("Ord_status",50)->default("Ordered");
            $table->string("Email")->nullable(false);
            $table->string("Quantity")->nullable(false);
            $table->integer("Size")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
