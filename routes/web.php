<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRecipeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Recipe;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RecipeController;
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
Route::middleware(['xss'])->group(function (){
    Route::get('/', [HomepageController::class, 'index']);
    Route::get('/recipe/{recipe:slug}', [RecipeController::class, 'show']);
});

Route::middleware(['guest','xss'])->group(function (){
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);

    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

});
Route::middleware(['auth','xss'])->group(function (){
    Route::post('/recipe/{recipe:slug}/create', [LikeController::class, 'store']);
    Route::post('/recipe/{recipe:slug}/destroy/{like:id}', [LikeController::class, 'destroy']);
});

Route::middleware(['auth', 'commentLikes','xss'])->group(function (){
    Route::post('/recipe/{recipe:slug}/comment/create', [CommentController::class, 'store']);
});

Route::middleware(['auth','likes','xss'])->group(function (){
    Route::get('/create', [RecipeController::class, 'create']);
    Route::post('/create', [RecipeController::class, 'store']);
});

Route::middleware(['auth','xss'])->group(function (){
    Route::get('/favourites', [LikeController::class, 'index']);

    Route::get('/user-details', [UserController::class, 'show']);
    Route::get('/user-details/edit', [UserController::class, 'edit']);
    Route::patch('/user-details/update/{user}', [UserController::class, 'update']);

    Route::get('/logout', [SessionController::class, 'destroy']);
});

Route::middleware(['moderator','xss'])->group(function (){
    Route::get('/recipes', [AdminRecipeController::class, 'index']);
    Route::get('/recipes/create', [AdminRecipeController::class, 'create']);
    Route::post('/recipes/create', [AdminRecipeController::class, 'store']);
    Route::get('/recipes/edit/{recipe:slug}', [AdminRecipeController::class, 'edit']);
    Route::patch('/recipes/update/{recipe:slug}', [AdminRecipeController::class, 'update']);
    Route::patch('/recipes/published/update/{recipe:slug}', [AdminRecipeController::class, 'published']);
    Route::delete('/recipes/delete/{recipe:slug}', [AdminRecipeController::class, 'destroy']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/create', [CategoryController::class, 'create']);
    Route::post('/categories/create', [CategoryController::class, 'store']);
    Route::get('/categories/edit/{category:slug}', [CategoryController::class, 'edit']);
    Route::patch('/categories/update/{category:slug}', [CategoryController::class, 'update']);
    Route::delete('/categories/delete/{category:slug}', [CategoryController::class, 'destroy']);
});

Route::middleware(['admin','xss'])->group(function (){
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/users', [AdminUserController::class, 'index']);
    Route::get('/admin/users/create', [AdminUserController::class, 'create']);
    Route::post('/admin/users/create', [AdminUserController::class, 'store']);
    Route::get('/admin/users/edit/{user:username}', [AdminUserController::class, 'edit']);
    Route::patch('/admin/users/update/{user:username}', [AdminUserController::class, 'update']);
    Route::delete('/admin/users/delete/{user:username}', [AdminUserController::class, 'destroy']);
});
