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
        Schema::create('laibraries', function (Blueprint $table) {
            // $table->id();
            // $table->unsignedBigInteger('stu_id');
            // $table->foreign('stu_id')->references('stu_id')->on('students');
            // $table->string('books');
            // $table->string('due_date')->nullable();
            // $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laibraries');
    }
};
