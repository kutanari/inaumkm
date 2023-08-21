<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TrainingController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\CompanyProductsController;
use App\Http\Controllers\Api\CategoryProductsController;
use App\Http\Controllers\Api\NumberOfEmployeeController;
use App\Http\Controllers\Api\CompanyTrainingsController;
use App\Http\Controllers\Api\TrainingCompaniesController;
use App\Http\Controllers\Api\NumberOfEmployeeCompaniesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('categories', CategoryController::class);

        // Category Products
        Route::get('/categories/{category}/products', [
            CategoryProductsController::class,
            'index',
        ])->name('categories.products.index');
        Route::post('/categories/{category}/products', [
            CategoryProductsController::class,
            'store',
        ])->name('categories.products.store');

        Route::apiResource('products', ProductController::class);

        Route::apiResource('trainings', TrainingController::class);

        // Training Companies
        Route::get('/trainings/{training}/companies', [
            TrainingCompaniesController::class,
            'index',
        ])->name('trainings.companies.index');
        Route::post('/trainings/{training}/companies/{company}', [
            TrainingCompaniesController::class,
            'store',
        ])->name('trainings.companies.store');
        Route::delete('/trainings/{training}/companies/{company}', [
            TrainingCompaniesController::class,
            'destroy',
        ])->name('trainings.companies.destroy');

        Route::apiResource(
            'number-of-employees',
            NumberOfEmployeeController::class
        );

        // NumberOfEmployee Companies
        Route::get('/number-of-employees/{numberOfEmployee}/companies', [
            NumberOfEmployeeCompaniesController::class,
            'index',
        ])->name('number-of-employees.companies.index');
        Route::post('/number-of-employees/{numberOfEmployee}/companies', [
            NumberOfEmployeeCompaniesController::class,
            'store',
        ])->name('number-of-employees.companies.store');

        Route::apiResource('companies', CompanyController::class);

        // Company Products
        Route::get('/companies/{company}/products', [
            CompanyProductsController::class,
            'index',
        ])->name('companies.products.index');
        Route::post('/companies/{company}/products', [
            CompanyProductsController::class,
            'store',
        ])->name('companies.products.store');

        // Company Trainings
        Route::get('/companies/{company}/trainings', [
            CompanyTrainingsController::class,
            'index',
        ])->name('companies.trainings.index');
        Route::post('/companies/{company}/trainings/{training}', [
            CompanyTrainingsController::class,
            'store',
        ])->name('companies.trainings.store');
        Route::delete('/companies/{company}/trainings/{training}', [
            CompanyTrainingsController::class,
            'destroy',
        ])->name('companies.trainings.destroy');
    });
