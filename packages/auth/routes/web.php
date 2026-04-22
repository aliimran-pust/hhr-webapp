<?php

use AI\Auth\PackageConst;
use Illuminate\Support\Facades\Route;
use AI\Auth\Http\Controllers\RoleController;
use AI\Auth\Http\Controllers\UserController;
use AI\Auth\Http\Controllers\LoginController;
use AI\Auth\Http\Controllers\DashboardController;
use AI\Auth\Http\Controllers\PermissionController;
use AI\Auth\Http\Controllers\RolePermissionController;

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::middleware(['web'])->group(function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('/home', [DashboardController::class, 'index'])->middleware(['auth'])->name('home');
});

Route::middleware(['web', 'auth', 'revalidate'])->prefix('auth')->name('auth.')->group(function () {
    $namespace = PackageConst::PACKAGE_NAME;

    // Route::middleware('can:settings-access')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::get('role-permissions', [RolePermissionController::class, 'index'])->name('rp.index');
        Route::get('role-permissions-create', [RolePermissionController::class, 'create'])->name('rp.create');
        Route::get('role-permissions-store', [RolePermissionController::class, 'store'])->name('rp.store');
        Route::get('role-permissions/{roleId}', [RolePermissionController::class, 'edit'])->name('rp.edit');
        Route::put('role-permissions/{roleId}', [RolePermissionController::class, 'update'])->name('rp.update');
        Route::resource('users', UserController::class);
    // });

    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware(['can:change-password'])->group(function () {
        Route::get('change_password', [DashboardController::class, 'changePasswordForm'])->name('change_password');
        Route::put('change_password', [DashboardController::class, 'updatePassword']);
    });
});
