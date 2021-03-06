<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Users\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UIController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

    Route::get('admin/users/login',[LoginController::class,'index']);
    Route::post('admin/users/login/store',[LoginController::class,'store']);

    Route::get('user/users/register',[RegisterController::class,'index2']);
    Route::post('user/users/register',[RegisterController::class,'store2']);

Route::middleware(['auth'])->group(function (){

    Route::prefix('user')->group(function (){

        Route::get('/',[UserController::class,'index'])->name('user');
        Route::get('/main',[UserController::class,'index']);

        Route::get('UI/update',[UIController::class,'update']);
        Route::post('UI/update',[UIController::class,'store']);

        Route::post('upload/services',[\App\Http\Controllers\Admin\UpAvatarController::class,'store']);

    });

    #Admin
    Route::prefix('admin')->group(function (){
        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('main',[MainController::class,'index']);


        #Menu
        Route::prefix('menus')->group(function (){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get("list", [MenuController::class,'index']);
            Route::get("edit/{menu}", [MenuController::class,'show']);
            Route::post("edit/{menu}", [MenuController::class,'update']);
            Route::delete('destroy',[MenuController::class,'destroy']);
        });


        #Product
        Route::prefix('product')->group(function(){
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('list',[ProductController::class,'index']);
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::delete('destroy',[ProductController::class,'destroy']);
        });

        #Upload
        Route::post('upload/services',[\App\Http\Controllers\Admin\UploadController::class,'store']);
    });



});

Route::get("/",);




