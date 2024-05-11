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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('model')->nullable();
            $table->string('capacity')->nullable();
            $table->text('description')->nullable();
            $table->string('main_img');
            $table->string('sub_img1')->nullable();
            $table->string('sub_img2')->nullable();
            $table->string('sub_img3')->nullable();
            $table->boolean('is_home')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
