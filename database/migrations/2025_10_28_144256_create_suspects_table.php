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
        Schema::create('suspects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crime_id');
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');
            $table->date('date_of_birth');
            $table->text('statement');
            $table->timestamps();

            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspects');
    }
};
