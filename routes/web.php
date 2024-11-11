<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Medico\AuthControlller;
use App\Http\Controllers\Medico\Dashboard\DashboardController;
use App\Http\Controllers\Medico\Dashboard\ProfileController;
use App\Http\Controllers\Medico\RegisterControlller;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('medico')->group(function () {
    Route::get("/login", [AuthControlller::class, 'login'])->name('medico.login');
    Route::post("/login", [AuthControlller::class, 'auth'])->name('medico.authenticate');
    Route::get("/logout", [AuthControlller::class, 'logout'])->name('medico.logout');
    Route::get("/register", [RegisterControlller::class, 'index'])->name('medico.register');
    Route::post("/register", [RegisterControlller::class, 'store'])->name('medico.register.store');

    Route::prefix("dashboard")->middleware("auth:web")->group(function () {
        Route::get("/", [DashboardController::class, 'index'])->name('medico.dashboard');
        Route::get("/profile", [ProfileController::class, 'profile'])->name('medico.profile');
    });
});

