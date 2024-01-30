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
        Schema::create('preliminaryproposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('groupid');
            // Define the foreign key constraint
            $table->foreign('groupid')->references('id')->on('studentsgroups');
            $table->string('projectname');
            $table->string('purposelstatus')->default('NotApproved');
            $table->unsignedBigInteger('superviserid');
            $table->foreign('superviserid')->references('id')->on('superviser');
            $table->text('electivecourses')->nullable();
            $table->text('programminglanguagetools')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preliminaryproposals');
    }
};
