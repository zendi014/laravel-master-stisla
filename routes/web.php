<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{DashboardController, RoleController, UserController, SettingController};

use App\Http\Controllers\Operator\{BookController};


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('roles/reload-permissions/{id}', [AdRoleControllerminRole::class, 'reloadPermissions'])->name('roles.update');
    Route::get('roles/reload-permissions', [RoleController::class, 'reloadPermissions'])->name('roles.update');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('settings/remove/{id}', [SettingController::class, 'remove'])->name('settings.update');
    Route::get('settings', [SettingController::class, 'index'])->name('settings.update');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});



Route::prefix('operator')->middleware(['auth'])->group(function () {
    Route::controller(BookController::class)->group(function () { 
        // run php artisan make:controller BookController --resource
        //  run php artisan make:model Book -m
        Route::group([
            'prefix'     => 'book', // di url panggil http://127.0.0.1:8000/operator/book
        ], function() {
            Route::get('/', 'index')->name('operator.book.index');
            Route::any('ajax', 'ajax')->name('operator.book.ajax');
            Route::get('create', 'create')->name('operator.book.create');
            Route::post('store', 'store')->name('operator.book.store');
            Route::get('edit/{id}', 'edit')->name('operator.book.edit');
            Route::post('update/{id}', 'update')->name('operator.book.update');
            Route::get('destroy/{id}', 'destroy')->name('operator.book.destroy');
        });
    }); 
});




Route::prefix('user')->middleware(['auth'])->group(function () {

});


