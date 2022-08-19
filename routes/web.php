<?php

use App\Http\Controllers\BiaProcessController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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



Route::middleware([
    'auth', //Antes estaba como auth:sanctum auth:web
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')
        ->can('ver dashboard');

    Route::resource('users', UserController::class)
    ->only(['index','create','store','edit','update'])
    ->names('admin.users');

    Route::resource('roles', RoleController::class)
    ->only(['index','create','store','edit','update'])
    ->names('admin.roles');

    Route::resource('bia_processes', BiaProcessController::class)
    ->only(['index','create','store','edit','update'])
    ->names('admin.biaprocesses');

    Route::resource('levels', LevelController::class)
    ->only(['index','create','store','edit','update'])
    ->names('admin.levels');
    

    
});

Route::middleware(['auth:sactum',
    config('jetstream.auth_session'),
    'verfied'
    ])->group(function () {
    //Rutas para exportar usuarios en excel y pdf
    Route::get('excel/users', [UserController::class,'exportExcel'])->name('excel.users');
});


Route::get('prueba', function () {
    return view('emails.new_user_mail');

});