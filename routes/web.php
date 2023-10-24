<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;

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

//USER ROUTES
Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'makeRegistration'])->name('register.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'makeLogin'])->name('login.make');
});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

//DASHBOARD ROUTES
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');
});

//INCOMES CATEGORIES ROUTES
Route::group(['middleware' => 'auth'], function(){
    Route::get('/income-categories/index', [IncomeController::class, 'indexCategories'])->name('income-categories');
    Route::get('/income-category/create', [IncomeController::class, 'categoryCreate'])->name('income-category.create');
    Route::post('/income-category/store', [IncomeController::class, 'categoryStore'])->name('income-category.store');
    Route::get('/income-category/edit/{incomeCategory:id}', [IncomeController::class, 'editCategory'])->name('income-category.edit');
    Route::put('/income-category/update/{incomeCategory:id}', [IncomeController::class, 'categoryUpdate'])->name('income-category.update');
    Route::delete('/income-category/delete/{incomeCategory:id}', [IncomeController::class, 'categoryDelete'])->name('income-category.delete');
});

//INCOMES ROUTES
Route::group(['middleware' => 'auth'], function(){
    Route::get('/incomes/index', [IncomeController::class, 'index'])->name('incomes');
    Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
    Route::post('/income/store', [IncomeController::class, 'store'])->name('income.store');
    Route::get('/income/edit/{income:id}', [IncomeController::class, 'edit'])->name('income.edit');
    Route::put('/income/update/{income:id}', [IncomeController::class, 'update'])->name('income.update');
    Route::delete('/income/delete/{income:id}', [IncomeController::class, 'delete'])->name('income.delete');
});
