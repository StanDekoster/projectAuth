<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ItemController;
use \App\Http\Controllers\FAQController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\ProfileController;


Route::get('/', [ItemController::class,('welcome')])
->middleware(['auth', 'verified'])
->name('welcome');


Route::get('dashboard', [ItemController::class,('index')])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


    
Route::view('dashboard/create-item', 'Item.create-item')
->middleware(['auth', 'verified'])
->name('create-item');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/view/{item}', [ItemController::class, 'show'])->name('item.view');

Route::get('visitor/view/{item}', [ItemController::class, 'visitorshow'])->name('visitor.item.view');

Route::get('/edit/{item}', [ItemController::class, 'edit' ])
    ->middleware(['auth'])
    ->name('item.edit');

    Route::put('/update/{item}', [ItemController::class, 'update' ])
    ->middleware(['auth'])
    ->name('item.update');

Route::resource('posts', ItemController::class);
Route::post('created', [ItemController::class, 'store'])->name('store');
Route::delete('{item}', [ItemController::class, 'destroy'])->name('remove.item');
Route::get('ok', [ItemController::class, 'show'])->name('item.like');



//FAQ
Route::get('/FAQ', [FAQController::class, 'index'])->name('FAQ');

//Profile

Route::get('profile/create-profile', [ProfileController::class, 'create'])->name('create.profile');
Route::get('profile/view/{profile}', [ProfileController::class, 'show'])->name('view.profile');

Route::post('/store-profile', [ProfileController::class, 'store'])->name('store.profile');
Route::get('profile/edit/{profile}', [ProfileController::class, 'edit'])->name('edit.profile');
Route::put('profile/update/{profile}', [ProfileController::class, 'update'])->name('update.profile');

//User

Route::get('/users', [UserController::class, 'userList'])->name('user.user.list');
Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');



//ADMIN
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/users', [AdminController::class, 'adminUserList'])->name('admin.user.list');
Route::put('admin/users/{user}/appoint', [AdminController::class, 'appointAdmin'])->name('appoint.admin');




require __DIR__.'/auth.php';
//layout.navigation.blade contains dropdown menu