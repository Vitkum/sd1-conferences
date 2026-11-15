<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ConferenceController;

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

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.index');

Route::get('/admin/conferences', [ConferenceController::class, 'index'])
    ->name('admin.conferences.index');

Route::get('/admin/conferences/create', [ConferenceController::class, 'create'])
    ->name('admin.conferences.create');

Route::post('/admin/conferences', [ConferenceController::class, 'store'])
    ->name('admin.conferences.store');

Route::get('/admin/conferences/{id}/edit', [ConferenceController::class, 'edit'])
    ->name('admin.conferences.edit');

Route::put('/admin/conferences/{id}', [ConferenceController::class, 'update'])
    ->name('admin.conferences.update');

Route::delete('/admin/conferences/{id}', [ConferenceController::class, 'destroy'])
    ->name('admin.conferences.destroy');
