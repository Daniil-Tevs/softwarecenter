<?php

	use App\Http\Controllers\Api\ProjectController;
	use App\Http\Controllers\Api\TaskController;
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

			Route::get('{project}/tasks', 'tasks')->name('tasks');
			Route::post('{project}/tasks', 'storeTasks')->name('tasks.store');
		});

		Route::controller(TaskController::class)->prefix('tasks')->name('projects.')->group(function () {
			Route::get('{task}', 'show')->name('show');
			Route::put('{task}', 'update')->name('update');
		});
	});
