<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DistrictController;
use Illuminate\Support\Facades\Route;

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
//Auth::routes();
Route::as('admin.')->group(function () {
    Route::get('/auth/{provider}', [UserController::class, 'redirectToProvider'])->name('auth.provider');
    Route::get('/auth/{provide}/callback', [UserController::class, 'handleProviderCallback']);

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login1');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::as('password.')->group(function () {
            Route::get('reset-password', [ResetPasswordController::class, 'showResetForm'])->name('reset.index');
            Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('reset.update');
        });

        Route::middleware(['redirect_change_pass'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

            Route::resource('roles', RoleController::class)->except('show');
            Route::resource('permissions', PermissionController::class)->except('show', 'create');

            // USER
            Route::resource('users', UserController::class)->except('show');
            Route::post('users/switch/change', [UserController::class, 'switchUserChange'])->name('users.switch.change');
            Route::get('users/switch/back/{user}', [UserController::class, 'switchUserBack'])->name('users.switch.back');
            Route::get('users/switch/{user}', [UserController::class, 'switchUser'])->name('users.switch');

            // PRODUCT GROUP
            Route::resource('product-groups', ProductGroupController::class)->except('show');

            // PRODUCT
            Route::post('product-has-grouped', [ProductController::class, 'getProductGrouped'])->name('get-product-grouped');
            Route::resource('products', ProductController::class)->except('show');
            Route::get('products/priority', [ProductController::class, 'productByPriority'])->name('products.priority');

            // DISTRICT
            Route::resource('districts', DistrictController::class)->except('show');

            // FILE
            Route::prefix('files')->as('file.')->group(function () {
                Route::get('{type}', [FileController::class, 'handle'])->name('action');
            });

            //AJAX
            Route::get('get-province/{type}', [ProvinceController::class, 'getByType'])->name('get-province-type');
        });

    });
});
