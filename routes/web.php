<?php

use App\Http\Controllers\BiaProcessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

    Route::resource('categories', CategoryController::class)
    ->only(['index','create','store','edit','update'])
    ->names('admin.categories');


    //Rutas para los niveles
    Route::get('levels', [LevelController::class, 'index'])
    ->name('admin.levels.index');
    Route::get('levels/{bia_id}/create', [LevelController::class, 'create'])
    ->name('admin.levels.create');
    Route::post('levels', [LevelController::class,'store'])
    ->name('admin.levels.store');
    Route::get('levels/{level}/edit', [LevelController::class,'edit'])
    ->name('admin.levels.edit');
    Route::put('levels/{level}', [LevelController::class,'update'])
    ->name('admin.levels.update');

    Route::resource('parameters',ParameterController::class)
    ->names('admin.parameters');
    
    
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