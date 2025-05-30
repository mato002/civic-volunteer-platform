<?php

use App\Http\Controllers\admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VolunteerAuthController;
use App\Http\Controllers\Auth\OrganizationAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Volunteer Authentication Routes
Route::get('/volunteer/login', [VolunteerAuthController::class, 'showLoginForm'])->name('volunteer.login');
Route::post('/volunteer/login', [VolunteerAuthController::class, 'login']);
Route::get('/volunteer/register', [VolunteerAuthController::class, 'showRegisterForm'])->name('volunteer.register');
Route::post('/volunteer/register', [VolunteerAuthController::class, 'register']);
Route::post('/volunteer/logout', [VolunteerAuthController::class, 'logout'])->name('volunteer.logout');

// Organization Authentication Routes
Route::get('/organization/login', [OrganizationAuthController::class, 'showLoginForm'])->name('org.login');
Route::post('/organization/login', [OrganizationAuthController::class, 'login']);
Route::get('/organization/register', [OrganizationAuthController::class, 'showRegisterForm'])->name('org.register');
Route::post('/organization/register', [OrganizationAuthController::class, 'register']);
Route::post('/organization/logout', [OrganizationAuthController::class, 'logout'])->name('org.logout');


use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\OpportunityController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\VolunteerController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;


// Admin Dashboard Home
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('organizations', OrganizationController::class);
    Route::resource('opportunities', OpportunityController::class);
    Route::resource('registrations', RegistrationController::class)->only(['index', 'show', 'update']);
    Route::resource('volunteers', VolunteerController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});



require __DIR__.'/auth.php';
