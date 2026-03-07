<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    protected $fillable = [
        'user_id',
        'department',
        'team',
        'position',
        'bio',
        'profile_image',
        'phone',
        'extension',
        'office_location',
        'permissions_level',
        'account_status',
        'is_suspended',
        'suspension_reason',
        'suspension_date',
        'suspension_lifts_at',
        'last_login',
        'last_activity',
        'admin_notes',
        'managed_users_count',
        'access_dashboard',
        'access_users',
        'access_reports',
        'access_settings',
        'can_modify_permissions',
        'can_approve_content',
        'can_suspend_users',
        'can_delete_data',
        'mfa_enabled',
        'two_factor_method',
        'login_notifications_enabled',
    ];

    protected $casts = [
        'mfa_enabled' => 'boolean',
        'access_dashboard' => 'boolean',
        'access_users' => 'boolean',
        'access_reports' => 'boolean',
        'access_settings' => 'boolean',
        'can_modify_permissions' => 'boolean',
        'can_approve_content' => 'boolean',
        'can_suspend_users' => 'boolean',
        'can_delete_data' => 'boolean',
        'is_suspended' => 'boolean',
        'login_notifications_enabled' => 'boolean',
        'last_login' => 'datetime',
        'last_activity' => 'datetime',
        'suspension_date' => 'datetime',
        'suspension_lifts_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
