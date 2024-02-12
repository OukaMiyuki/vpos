<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'user-access:super_admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('index');
    })->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::post('/admin/profile/info/store', [AdminController::class, 'adminProfileInfoStore'])->name('admin.profile.info.store');
    Route::get('/admin/dashboard/marketing', [AdminController::class, 'adminMarketingDashboard'])->name('admin.marketing.dashboard');
    Route::get('/change/password', [AdminController::class, 'changePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'updatePassword'])->name('update.password');
});

Route::get('/logout', [AdminController::class, 'adminLogoutPage'])->name('admin.logout.page');

require __DIR__.'/auth.php';
