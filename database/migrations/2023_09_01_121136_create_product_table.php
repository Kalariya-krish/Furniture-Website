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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("Pro_id")->nullable(false);
            $table->string("Pro_name")->nullable(false);
            $table->string("Pro_type")->nullable(false);
            $table->string("Pro_material")->nullable(false);
            $table->string("Pro_color")->nullable(false);
            $table->integer("Pro_price")->nullable(false);
            $table->string("Pro_img")->nullable(false);
            $table->string("Other_img1");
            $table->string("Other_img2");
            $table->string("Other_img3");
            $table->string("Other_img4");
            $table->string("Product_status",50)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
