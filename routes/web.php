<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\front\FrontProfileController;
use App\Http\Controllers\Front\ExerciseController;
use App\Http\Controllers\Front\FrontSubscriptionController;
use Illuminate\Support\Facades\Route;

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

//User Routes
require __DIR__ . '/front_auth.php';
Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['front'])->name('dashboard');

Route::middleware('auth:front')->group(function () {
    Route::get('/profile', [FrontProfileController::class, 'edit'])->name('front.profile.edit');
    Route::patch('/profile', [FrontProfileController::class, 'update'])->name('front.profile.update');
    Route::delete('/profile', [FrontProfileController::class, 'destroy'])->name('front.profile.destroy');
    Route::get('/checkin', [\App\Http\Controllers\Front\CheckinController::class, 'index'])->name('front.checkin.index');
    Route::post('/checkin', [\App\Http\Controllers\Front\CheckinController::class, 'store'])->name('front.checkin.store');
    Route::get('/history', [\App\Http\Controllers\Front\HistoryController::class, 'index'])->name('front.history.index');
    Route::get('front/subscription', [\App\Http\Controllers\Front\SubscriptionController::class, 'index'])->name('front.subscription.index');
    Route::post('/subscription', [\App\Http\Controllers\Front\SubscriptionController::class, 'addSubscription'])->name('front.subscription.addSubscription');
});

Route::get('/subscription', [FrontSubscriptionController::class, 'index'])->name('user.subscription.index');

Route::get('/', function () {
    return view('users.index');
});

Route::get('/subscriptions', function () {
    return view('users.subscriptions');
});

Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises.index');
Route::get('/contact', function () {
    return view('users.contact');
});

Route::get('/about', function () {
    return view('users.about');
});

//Admin Routes
require __DIR__ . '/auth.php';
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('admin/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')->group(function () {
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('users', 'UserController');
    Route::resource('shifts', 'ShiftController');
    Route::resource('locations', 'LocationController');
    Route::resource('clients', 'ClientController');
    Route::resource('exercises', 'ExerciseController');
    Route::resource('muscleGroups', 'MuscleGroupController');
    Route::resource('subscriptions', 'SubscriptionController');
    Route::resource('checkins', 'ClientCheckinController');
});
