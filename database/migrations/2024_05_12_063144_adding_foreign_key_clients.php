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
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('client_type_id');
            $table->dropColumn('type');
            $table->foreign('client_type_id')
                  ->references('id')
                  ->on('client_types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('type');
            $table->dropForeign(['client_type_id']);
            $table->dropColumn('client_type_id');
        });
    }
};
