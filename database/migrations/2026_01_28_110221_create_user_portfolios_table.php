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
        Schema::create('user_portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable(); // Full Stack Developer
            $table->text('bio')->nullable(); // About section
            $table->string('location')->nullable();
            $table->string('profile_image')->nullable();
        // Social links
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('website')->nullable();
        // Professional
            $table->string('headline')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('availability')->nullable();
        // Skills
            $table->string('primary_skill')->nullable();
            $table->string('secondary_skill')->nullable();
            $table->text('tools')->nullable();
        // Contact
            $table->string('phone')->nullable();
            $table->string('email_public')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
        // Location
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->boolean('remote_only')->default(false);
        // Career
            $table->text('education')->nullable();
            $table->text('certifications')->nullable();
            $table->text('achievements')->nullable();
        // SEO / Public
            $table->string('username')->unique()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_portfolios');
    }
};
