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
        Schema::create('supervisersessions', function (Blueprint $table) {
            $table->id();
            $table->Integer('superviserid')->default(1);
            // $table->unsignedBigInteger('superviserid')->default(1);
            // Define the foreign key constraint
            // $table->foreign('superviserid')->references('id')->on('superviser');
            $table->string('session');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisersessions');
    }
};
