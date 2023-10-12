<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\WebsiteController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BlogCategoryController;

Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/category-blogs', [WebsiteController::class, 'categoryBlogs'])->name('category-blogs');
Route::get('/blog-details', [WebsiteController::class, 'blogDetails'])->name('blog-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


//    Route::prefix('blog-categories')->name('blog-categories.')->group(function (){
//        Route::get('create', [DashboardController::class, 'dashboard'])->name('create');
//    });
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('blog-categories', BlogCategoryController::class);

});


