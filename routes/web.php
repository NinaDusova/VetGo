<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/signup', [AuthManager::class, 'signup'])->name('signup');
Route::post('/signup', [AuthManager::class, 'signupPost'])->name('signup.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/page', [UserController::class, 'page'])->name('page');
Route::get('/userprofile', [UserController::class, 'userprofile'])->name('userprofile');
Route::get('/edituser', [UserController::class, 'edituser'])->name('edituser');
Route::put('/updateuser', [UserController::class, 'updateuser'])->middleware('auth')->name('updateuser');
Route::delete('/deleteuser', [UserController::class, 'deleteuser'])->middleware('auth')->name('deleteuser');
Route::post('/uploadphoto', [UserController::class, 'uploadphoto'])->middleware('auth')->name('uploadphoto');

Route::get('/petprofile', [PetController::class, 'petprofile'])->name('petprofile');
Route::get('/pets', [PetController::class, 'pets'])->name('pets');
Route::get('/investigations', [PetController::class, 'investigations'])->name('investigations');
Route::get('/petedit', [PetController::class, 'petedit'])->name('petedit');

