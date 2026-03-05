<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AdminProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Filter by name
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Filter by email
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        // Filter by role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $users = $query->paginate(15);

        return view('Admin.users.index', compact('users'));
    }


    public function show(User $user)
    {
        $user->load(['portfolio', 'educations', 'skills', 'experiences', 'documents']);

        return view('Admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('Admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
        ]);

        $user->update($request->only(['name', 'email', 'role']));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // Prevent deleting the last admin
        if ($user->role === 'admin' && User::where('role', 'admin')->count() <= 1) {
            return redirect()->route('admin.users.index')->with('error', 'Cannot delete the last admin user');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }

    /**
     * Show the admin's own profile
     */
    public function adminProfileShow()
    {
        $user = auth()->user();
        $adminProfile = AdminProfile::where('user_id', $user->id)->first();

        return view('Admin.profile.show', [
            'user' => $user,
            'adminProfile' => $adminProfile,
        ]);
    }

    /**
     * Edit the admin's own profile
     */
    public function adminProfileEdit()
    {
        $user = auth()->user();
        $adminProfile = AdminProfile::where('user_id', $user->id)->first();

        return view('Admin.profile.edit', [
            'user' => $user,
            'adminProfile' => $adminProfile,
        ]);
    }

    /**
     * Update the admin's own profile
     */
    public function adminProfileUpdate(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            // Basic Profile
            'department' => 'nullable|string|max:255',
            'team' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            
            // Contact
            'phone' => 'nullable|string|max:20',
            'extension' => 'nullable|string|max:20',
            'office_location' => 'nullable|string|max:255',
            
            // Notes (only super admin can edit)
            'admin_notes' => auth()->user()->role === 'super_admin' ? 'nullable|string' : 'nullable|string',
        ]);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $path = $file->store('admin-profiles', 'public');
            $data['profile_image'] = $path;
        } else {
            unset($data['profile_image']);
        }

        // Create or update admin profile
        $adminProfile = AdminProfile::updateOrCreate(
            ['user_id' => $user->id],
            array_merge(['user_id' => $user->id], $data)
        );

        return redirect()->route('admin.profile.show')->with('success', 'Admin profile updated successfully!');
    }

    /**
     * View admin profile (for other admins)
     */
    public function viewAdminProfile(User $user)
    {
        if ($user->role !== 'admin' && $user->role !== 'super_admin') {
            return redirect()->route('admin.dashboard')->with('error', 'User is not an admin');
        }

        $adminProfile = AdminProfile::where('user_id', $user->id)->first();

        return view('Admin.profile.view', [
            'user' => $user,
            'adminProfile' => $adminProfile,
        ]);
    }

    /**
     * Edit admin profile (for super admins)
     */
    public function editAdminProfile(User $user)
    {
        if (auth()->user()->role !== 'super_admin') {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        if ($user->role !== 'admin' && $user->role !== 'super_admin') {
            return redirect()->route('admin.dashboard')->with('error', 'User is not an admin');
        }

        $adminProfile = AdminProfile::where('user_id', $user->id)->first();

        return view('Admin.profile.edit-admin', [
            'user' => $user,
            'adminProfile' => $adminProfile,
        ]);
    }

    /**
     * Update admin profile (for super admins)
     */
    public function updateAdminProfile(Request $request, User $user)
    {
        if (auth()->user()->role !== 'super_admin') {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $data = $request->validate([
            'department' => 'nullable|string|max:255',
            'team' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'phone' => 'nullable|string|max:20',
            'extension' => 'nullable|string|max:20',
            'office_location' => 'nullable|string|max:255',
            'permissions_level' => 'required|in:super_admin,admin,moderator,support',
            'account_status' => 'required|in:active,inactive,pending',
            'is_suspended' => 'boolean',
            'suspension_reason' => 'nullable|string|max:500',
            'admin_notes' => 'nullable|string|max:1000',
            'managed_users_count' => 'nullable|integer|min:0',
            
            // Access Controls
            'access_dashboard' => 'boolean',
            'access_users' => 'boolean',
            'access_reports' => 'boolean',
            'access_settings' => 'boolean',
            
            // Action Permissions
            'can_modify_permissions' => 'boolean',
            'can_approve_content' => 'boolean',
            'can_suspend_users' => 'boolean',
            'can_delete_data' => 'boolean',
            
            // Security
            'mfa_enabled' => 'boolean',
            'login_notifications_enabled' => 'boolean',
        ]);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $path = $file->store('admin-profiles', 'public');
            $data['profile_image'] = $path;
        } else {
            unset($data['profile_image']);
        }

        // Handle suspension
        if ($request->has('is_suspended') && $request->boolean('is_suspended')) {
            $data['suspension_date'] = now();
        }

        // Create or update admin profile
        $adminProfile = AdminProfile::updateOrCreate(
            ['user_id' => $user->id],
            array_merge(['user_id' => $user->id], $data)
        );

        return redirect()->route('admin.profile.view', $user)->with('success', 'Admin profile updated successfully!');
    }

    /**
     * Delete admin profile/suspend admin
     */
    public function deleteAdminProfile(User $user)
    {
        if (auth()->user()->role !== 'super_admin') {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        // Prevent last admin from being deleted
        if ($user->role === 'super_admin' && User::where('role', 'super_admin')->count() <= 1) {
            return redirect()->back()->with('error', 'Cannot delete the last super admin');
        }

        $user->delete();
        AdminProfile::where('user_id', $user->id)->delete();

        return redirect()->route('admin.users.index')->with('success', 'Admin deleted successfully');
    }
}