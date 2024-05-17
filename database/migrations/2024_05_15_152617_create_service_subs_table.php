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
        Schema::create('service_subs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('img1')->nullable();
            $table->string('img_desc1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img_desc2')->nullable();
            $table->string('img3')->nullable();
            $table->string('img_desc3')->nullable();
            $table->integer('master_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_subs');
    }
};
