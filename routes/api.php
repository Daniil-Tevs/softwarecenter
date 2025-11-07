<?php

	use App\Http\Controllers\Api\ProjectController;
	use App\Http\Controllers\Auth\LoginController;
	use App\Http\Controllers\Auth\RegisterController;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Route;

	Route::prefix('auth')->name('auth.')->group(function () {
		Route::post('login', [LoginController::class, 'index'])->name('login');
		Route::post('register', [RegisterController::class, 'index'])->name('login');
	});

	Route::middleware('auth:sanctum')->group(function () {
		Route::controller(ProjectController::class)->prefix('projects')->name('projects.')->group(function () {
			Route::post('/', 'store')->name('store');
		});
	});
