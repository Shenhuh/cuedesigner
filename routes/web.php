<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\TextureController;
use App\Http\Controllers\ClipartController;
use App\Http\Controllers\WrapController;
use App\Http\Controllers\WoodController;
use App\Http\Controllers\JointController;
use App\Http\Controllers\DesignerController;
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


// Route::get('/designer', function () {
//     return view('designer');
// });
Route::get('/designer', [DesignerController::class, 'index']);

Auth::routes();

// Route::get('/dashboard', function () {
//     return view('dashboard'); // Create a dashboard view
// })->middleware('auth');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::get('/dynamic-content/{type}', [ContentController::class, 'getDynamicContent'])->name('dynamic.content');
   
    //Textures
    Route::post('/admin/textures', [TextureController::class, 'store'])->name('textures.store'); // Store new texture
    Route::put('/admin/textures/{id}', [TextureController::class, 'update']);
    Route::delete('/admin/textures/{id}', [TextureController::class, 'destroy']);

    //Cliparts
    Route::post('/admin/cliparts', [ClipartController::class, 'store'])->name('cliparts.store'); // Store new texture
    Route::put('/admin/cliparts/{id}', [ClipartController::class, 'update']);
    Route::delete('/admin/cliparts/{id}', [ClipartController::class, 'destroy']);

    //Wraps
    Route::post('/admin/wraps', [WrapController::class, 'store'])->name('wraps.store'); // Store new texture
    Route::put('/admin/wraps/{id}', [WrapController::class, 'update']);
    Route::delete('/admin/wraps/{id}', [WrapController::class, 'destroy']);

    //Woods
    Route::post('/admin/woods', [WoodController::class, 'store'])->name('woods.store'); // Store new texture
    Route::put('/admin/woods/{id}', [WoodController::class, 'update']);
    Route::delete('/admin/woods/{id}', [WoodController::class, 'destroy']);

    //Joint
    Route::post('/admin/joints', [JointController::class, 'store'])->name('joints.store'); // Store new texture
    Route::put('/admin/joints/{id}', [JointController::class, 'update']);
    Route::delete('/admin/joints/{id}', [JointController::class, 'destroy']);
    
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
