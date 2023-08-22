<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\NumberOfEmployeeController;
use App\Http\Controllers\Front\FrontController;

use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Middleware\NormalUserMiddleware;
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
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/tentang-kami', [FrontController::class, 'about'])->name('tentang-kami');
Route::get('/kontak-kami', [FrontController::class, 'contact'])->name('kontak-kami');

Route::group(['middleware' => ['auth:sanctum', 'verified', SuperAdminMiddleware::class]], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

Route::group(['middleware' => ['auth:sanctum', 'verified', NormalUserMiddleware::class]], function () {
    Route::get('/user/dashboard', [FrontController::class, 'dashboard'])->name('user-dashboard');
});

Route::prefix('/')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('trainings', TrainingController::class);
        Route::resource(
            'number-of-employees',
            NumberOfEmployeeController::class
        );
        Route::resource('companies', CompanyController::class);
    });
