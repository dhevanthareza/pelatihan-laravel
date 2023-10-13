<?php

use App\Http\Controllers\PortalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Route::get("/", [PortalController::class, 'index']);
Route::get("/namasaya", [PortalController::class, 'nama']);

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/viewform', [AdminController::class, 'fungsi_viewform']);
    Route::post('/kirimdataform', [AdminController::class, 'fungsi_kirimdataform']);
    Route::get('/kirimemail', [AdminController::class, 'fungsi_kirimemail']);

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('create', [CategoryController::class, 'create']);
        Route::post('create', [CategoryController::class, 'insert']);
        Route::get('edit/{id}', [CategoryController::class, 'edit']);
        Route::post('edit/{id}', [CategoryController::class, 'update']);
        Route::get('delete/{id}', [CategoryController::class, 'delete']);
    });

//     Route::prefix('post')->group(function () {
//         Route::get('/', [PostController::class, 'index']);
//         Route::get('create', [PostController::class, 'create']);
//         Route::post('create', [PostController::class, 'insert']);
//         Route::get('edit/{id}', [PostController::class, 'edit']);
//         Route::post('edit/{id}', [PostController::class, 'update']);
//         Route::get('delete/{id}', [PostController::class, 'delete']);
//     });


//     Route::prefix('profile')->group(function () {
//         Route::get('{id}', [AdminController::class, 'edit']);
//         Route::post('{id}', [AdminController::class, 'update']);
//     });
});
