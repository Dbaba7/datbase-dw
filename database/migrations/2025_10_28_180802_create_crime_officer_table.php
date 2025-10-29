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
        Schema::create('crime_officer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crime_id');
            $table->unsignedBigInteger('officer_id');
            $table->timestamps();

            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('cascade');
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crime_officer');
    }
};
