<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\TechController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [AuthController::class, 'index'])->name('welcome');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('password/reset', [AuthController::class, 'showLinkRequestForm'])->name('auth.password.request');
Route::post('password/email', [AuthController::class, 'sendResetLinkEmail'])->name('auth.password.email');
Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'reset'])->name('auth.password.update');

Route::middleware(['auth', 'verified', IsUser::class])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/portfolio/profile', [UserController::class, 'portfolioProfile'])->name('portfolio.profile');
    Route::post('/portfolio/profile', [UserController::class, 'updatePortfolioProfile'])->name('portfolio.profile.update');

    Route::get('/portfolio/education', [EducationController::class, 'index'])->name('education.index');
    Route::post('/portfolio/education', [EducationController::class, 'store'])->name('education.store');
    Route::put('/portfolio/education/{education}', [EducationController::class, 'updateEducation'])->name('education.update');
    Route::delete('/portfolio/education/{education}', [EducationController::class, 'destroy'])->name('education.destroy');
    Route::get('/portfolio/education/{education}', [EducationController::class, 'show'])->name('education.show');

    Route::get('/documents', [EducationController::class, 'documents'])->name('documents.index');
    Route::post('/documents', [EducationController::class, 'storeDocument'])->name('documents.store');
    Route::put('/documents/{document}', [EducationController::class, 'updateDocument'])->name('documents.update');
    Route::delete('/documents/{document}', [EducationController::class, 'destroyDocument'])->name('documents.destroy');
    Route::get('/documents/{document}', [EducationController::class, 'showDocument'])->name('documents.show');

    Route::get('/skills', [TechController::class, 'skills'])->name('skill.index');
    Route::post('/skills', [TechController::class, 'storeSkill'])->name('skill.store');
    Route::put('/skills/{skill}', [TechController::class, 'updateSkill'])->name('skill.update');
    Route::delete('/skills/{skill}', [TechController::class, 'destroySkill'])->name('skill.destroy');
    Route::get('/skills/{skill}', [TechController::class, 'showSkill'])->name('skill.show');

    Route::get('/portfolio/experience', [TechController::class, 'experience'])->name('portfolio.experience');
    Route::post('/experiences', [TechController::class, 'storeExperience'])->name('experience.store');
    Route::put('/experiences/{experience}', [TechController::class, 'updateExperience'])->name('experience.update');
    Route::delete('/experiences/{experience}', [TechController::class, 'destroyExperience'])->name('experience.destroy');
    Route::get('/experiences/{experience}', [TechController::class, 'showExperience'])->name('experience.show');

    Route::get('/portfolio/preview', [UserController::class, 'preview'])->name('portfolio.preview');

    Route::get('/contact_us', [UserController::class, 'contactUs'])->name('contact_us.index');
    Route::post('/contact_us', [UserController::class, 'submitContactUs'])->name('contact_us.submit');

    Route::post('/logout', [AuthController::class, 'logout'])->name('user_logout');

});
Route::middleware(['auth', 'verified', IsAdmin::class])->group(function () {
    Route::get('/adminDashboard', [DashboardController::class, 'adminDashboard'])
        ->name('admin.dashboard');

    Route::resource('admin/users', AdminUserController::class, ['as' => 'admin']);

    // Admin Profile Routes
    Route::get('/admin/profile', [AdminUserController::class, 'adminProfileShow'])->name('admin.profile.show');
    Route::get('/admin/profile/edit', [AdminUserController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [AdminUserController::class, 'adminProfileUpdate'])->name('admin.profile.update');

    // View Other Admin Profiles
    Route::get('/admin/profile/{user}', [AdminUserController::class, 'viewAdminProfile'])->name('admin.profile.view');
    Route::get('/admin/profile/{user}/edit', [AdminUserController::class, 'editAdminProfile'])->name('admin.profile.edit-admin');
    Route::post('/admin/profile/{user}/update', [AdminUserController::class, 'updateAdminProfile'])->name('admin.profile.update-admin');
    Route::delete('/admin/profile/{user}', [AdminUserController::class, 'deleteAdminProfile'])->name('admin.profile.delete');

    Route::get('/contacts', [AdminUserController::class, 'contactsIndex'])->name('contacts.index');
    Route::get('/contacts/{contact}', [AdminUserController::class, 'contactsShow'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [AdminUserController::class, 'contactsDestroy'])->name('contacts.destroy');

    Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin_logout');
});
