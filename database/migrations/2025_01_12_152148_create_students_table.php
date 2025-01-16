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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dob')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nis')->nullable();
            $table->string('address')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('graduation_year')->nullable();
            $table->foreignId('student_class_id')->nullable()->constrained('student_classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
