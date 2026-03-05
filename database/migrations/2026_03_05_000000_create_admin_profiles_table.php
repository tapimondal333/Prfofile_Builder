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
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            
            // Basic Profile Information
            $table->string('department')->nullable(); // Engineering, Operations, etc.
            $table->string('team')->nullable(); // Backend, Frontend, DevOps, etc.
            $table->string('position')->nullable(); // Senior Admin, Admin, Super Admin
            $table->text('bio')->nullable(); // Admin biography
            $table->string('profile_image')->nullable(); // Admin profile picture
            
            // Contact Information
            $table->string('phone')->nullable();
            $table->string('extension')->nullable(); // Office extension
            $table->string('office_location')->nullable(); // Physical office location
            
            // Account Status & Security
            $table->enum('account_status', ['active', 'inactive', 'pending'])->default('active');
            $table->boolean('is_suspended')->default(false);
            $table->text('suspension_reason')->nullable();
            $table->timestamp('suspension_date')->nullable();
            $table->timestamp('suspension_lifts_at')->nullable(); // Auto-lift suspension
            
            // Activity Tracking
            $table->timestamp('last_login')->nullable();
            $table->timestamp('last_activity')->nullable();
            
            // Admin Notes & Management
            $table->text('admin_notes')->nullable(); // Internal notes about the admin
            $table->integer('managed_users_count')->default(0); // Count of users this admin manages
            
            // Permission Levels
            $table->enum('permissions_level', ['super_admin', 'admin', 'moderator', 'support'])->default('admin');
            
            // Access Controls
            $table->boolean('access_dashboard')->default(true);
            $table->boolean('access_users')->default(true);
            $table->boolean('access_reports')->default(true);
            $table->boolean('access_settings')->default(false);
            
            // Action Permissions
            $table->boolean('can_modify_permissions')->default(false);
            $table->boolean('can_approve_content')->default(true);
            $table->boolean('can_suspend_users')->default(true);
            $table->boolean('can_delete_data')->default(false);
            
            // Security Features
            $table->boolean('mfa_enabled')->default(true);
            $table->string('two_factor_method')->nullable(); // authenticator, sms, email
            $table->boolean('login_notifications_enabled')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_profiles');
    }
};
