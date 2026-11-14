<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/client', [ClientController::class, 'index'])
    ->name('client.index');

Route::get('/client/conferences/{id}', [ClientController::class, 'show'])
    ->name('client.show');

Route::post('/client/conferences/{id}/register', [ClientController::class, 'register'])
    ->name('client.register');

Route::get('/employee', [EmployeeController::class, 'index'])
    ->name('employee.index');

Route::get('/employee/conferences/{id}', [EmployeeController::class, 'show'])
    ->name('employee.show');
