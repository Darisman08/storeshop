<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AreaAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/dash', [AreaAdminController::class, 'index'])->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/product', [ProductController::class, 'index'])->middleware('auth');
Route::get('/product-table', [ProductController::class, 'table'])->middleware('auth');
Route::post('/product-store', [ProductController::class, 'store'])->middleware('auth');
Route::get('/product-edit-{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/product-update', [ProductController::class, 'update'])->middleware('auth');
Route::delete('/product-del-{id}', [ProductController::class, 'destroy'])->middleware('auth');

Route::get('/approval', [ApprovalController::class, 'index'])->middleware('auth');
Route::put('/approval-update', [ApprovalController::class, 'update'])->middleware('auth');

Route::get('/category', [CategoryController::class, 'index'])->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::get('/roles', [RoleController::class, 'index'])->middleware('auth');


