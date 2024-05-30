<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ItemController;
use \App\Http\Controllers\FAQController;
use \App\Http\Controllers\UserController;


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


//User

Route::get('/users', [UserController::class, 'userList'])->name('user.list');

//ADMIN

Route::get('admin/users', [UserController::class, 'adminUserList'])->name('admin.user.list');
Route::put('admin/users/{user}/appoint', [UserController::class, 'appointAdmin'])->name('appoint.admin');


require __DIR__.'/auth.php';
