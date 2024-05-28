<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ItemController;
use \App\Http\Controllers\FAQController;


Route::get('/', [ItemController::class,('welcome')])->name('welcome');


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

Route::get('/view/{item}', [ItemController::class, 'visitorshow'])->name('visitor.item.view');


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


require __DIR__.'/auth.php';
