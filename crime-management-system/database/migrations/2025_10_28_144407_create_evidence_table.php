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
        Schema::create('evidence', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crime_id');
            $table->text('description');
            $table->string('file_path')->nullable();
            $table->timestamp('collected_at')->useCurrent();
            $table->timestamps();

            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidence');
    }
};
