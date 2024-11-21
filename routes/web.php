<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::get('/page', [UserController::class, 'page'])->name('page');
Route::get('/userprofile', [UserController::class, 'userprofile'])->name('userprofile');
Route::get('/edituser', [UserController::class, 'edituser'])->name('edituser');

Route::get('/petprofile', [PetController::class, 'petprofile'])->name('petprofile');
Route::get('/pets', [PetController::class, 'pets'])->name('pets');
Route::get('/investigations', [PetController::class, 'investigations'])->name('investigations');
Route::get('/petedit', [PetController::class, 'petedit'])->name('petedit');

