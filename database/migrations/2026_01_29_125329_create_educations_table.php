<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('level'); 
            // ssc | hsc | graduation | post_graduation | other

            $table->string('course_name')->nullable();
            $table->string('stream')->nullable();

            $table->year('passing_year')->nullable();
            $table->string('marks')->nullable();

            $table->string('institution')->nullable();

            $table->string('certificate')->nullable(); // file path

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};