<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeesController;
	
Route::get('/login_form', [EmployeesController::class, 'login_form']);
Route::get('/login', [EmployeesController::class, 'login_form'])->name('login');
Route::get('/register_form', [EmployeesController::class, 'register_form']);

Route::post('/check_login', [EmployeesController::class, 'check_login']);
Route::post('/register_employee', [EmployeesController::class, 'register_employee']);

Route::get('/output_hash/{word}', [EmployeesController::class, 'output_hash']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [EmployeesController::class, 'dashboard']);
    Route::get('/sample_link', [EmployeesController::class, 'sample_link']);
    Route::get('/logout', [EmployeesController::class, 'logout']);
});

