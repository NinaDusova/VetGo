<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/puzzle', [HomeController::class, 'puzzle'])->name('puzzle');

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
Route::get('/pet/edit/{id?}', [PetController::class, 'petedit'])->name('petedit');
Route::put('/pet/update/{id?}', [PetController::class, 'petupdate'])->name('petupdate');
Route::post('/savepet', [PetController::class, 'savepet'])->name('savepet');
Route::post('/uploadphotopet/{id}', [PetController::class, 'uploadphotopet'])->name('uploadphotopet');
Route::get('/pet/{id}', [PetController::class, 'show'])->name('petprofile');
Route::delete('/pet/delete/{id}', [PetController::class, 'deletepet'])->name('deletepet');
Route::post('/upload-temp-photo', [PetController::class, 'uploadTempPhoto'])->name('uploadtempphoto');

Route::get('/doctorinfo', [DoctorController::class, 'doctorinfo'])->name('doctorinfo');
Route::get('/pets/{id}/edit', [DoctorController::class, 'editPet'])->name('doctor.editPet');
Route::put('/pets/{id}', [DoctorController::class, 'updatePet'])->name('doctor.updatePet');
Route::get('/doctor/page', [DoctorController::class, 'page'])->name('doctorpage');
Route::get('/doctorprofile', [DoctorController::class, 'profile'])->name('doctorprofile');
Route::get('/doctor/edit', [DoctorController::class, 'edit'])->name('doctoredit');
Route::post('/doctor/info/post', [DoctorController::class, 'infoPost'])->name('doctorinfo.post');
Route::get('/petclients', [DoctorController::class, 'showPets'])->name('petclients');
Route::get('/addpet', [DoctorController::class, 'showAddPetForm'])->name('addpet');
Route::post('/addpet', [DoctorController::class, 'addPet'])->name('addpet.post');
Route::delete('/removepet/{id}', [DoctorController::class, 'removePet'])->name('removepet');
