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
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('main_img','img1');
            $table->renameColumn('sub_img1','img2')->nullable();
            $table->renameColumn('sub_img2','img3')->nullable();
            $table->dropColumn('sub_img3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('img1','main_img');
            $table->renameColumn('img2','sub_img1')->nullable();
            $table->renameColumn('img3','sub_img2')->nullable();
            $table->string('sub_img3')->nullable();
        });
    }
};
