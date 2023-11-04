<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
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


Route::get('/', [EventsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'users'], static function () {
    Route::get('/', [UsersController::class, 'readAll'])->name('users');
    Route::get('/new/', [UsersController::class, 'edit'])->name('users.new');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/save', [UsersController::class, 'store'])->name('users.save');
});

Route::group(['middleware' => 'auth', 'prefix' => 'activity-log'], static function () {
    Route::get('/', [ActivityLogController::class, 'readAll'])->name('Log aktivity');
    Route::get('/detail/{id}', [ActivityLogController::class, 'getDetail'])->name('log.detail');
});

Route::group(['middleware' => 'auth', 'prefix' => 'roles'], static function () {
    Route::get('/', [RolesController::class, 'readAll'])->name('roles');
    Route::get('/new/', [RolesController::class, 'edit'])->name('roles.new');
    Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
    Route::post('/save', [RolesController::class, 'store'])->name('roles.save');
});


Route::group(['middleware' => 'auth', 'prefix' => 'events'], static function () {
    Route::get('/', [EventsController::class, 'index'])->name('events.index');
});

require __DIR__.'/auth.php';
