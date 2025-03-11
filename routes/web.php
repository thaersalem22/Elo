<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

// المسار لعرض جميع المهام
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// المسار لعرض صفحة إضافة مهمة جديدة
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// المسار لإضافة مهمة جديدة
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// المسار لعرض صفحة تعديل مهمة
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');

// المسار لتحديث المهمة
Route::post('/tasks/update/{id}', [TaskController::class, 'update'])->name('tasks.update');

// المسار لحذف مهمة
Route::post('/tasks/delete/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// إدارة المستخدمين
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
