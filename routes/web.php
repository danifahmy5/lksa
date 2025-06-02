<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;


// Login routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Logout route
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Donor CRUD routes
Route::resource('donors', DonorController::class);
Route::resource('incomes', App\Http\Controllers\IncomeController::class);
Route::resource('expense-categories', App\Http\Controllers\ExpenseCategoryController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('banks', BankController::class);
Route::resource('cash-flows', App\Http\Controllers\CashFlowController::class); // CashFlow CRUD
