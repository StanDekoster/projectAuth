<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ItemController;
use \App\Http\Controllers\FAQController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\TagController;


Route::get('/', [ItemController::class,('visitorIndex')])

->name('welcome');





    
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
Route::get('admin/faq', [FAQController::class, 'adminIndex'])->name('admin.faq');
Route::get('admin/faq-create', [FAQController::class, 'create'])->name('admin.faq.create');
Route::post('admin/faq-store', [FAQController::class, 'store'])->name('faq.store');


//Tag
Route::get('admin/cat-create', [TagController::class, 'index'])->name('admin.cat.create');
Route::post('admin/cat-store', [TagController::class, 'store'])->name('cat.store');





//Profile

Route::get('profile/view/{profile}', [ProfileController::class, 'show'])->name('view.profile');

Route::get('profile/create-profile', [ProfileController::class, 'create'])->name('create.profile');
Route::post('/store-profile', [ProfileController::class, 'store'])->name('store.profile');

Route::get('profile/edit/{profile}', [ProfileController::class, 'edit'])->name('edit.profile');
Route::put('profile/update/{profile}', [ProfileController::class, 'update'])->name('update.profile');



//Visitor

Route::get('visitor/view/{item}', [ItemController::class, 'visitorshow'])->name('visitor.item.view');
Route::get('/about', [ItemController::class, 'about'])->name('about');
Route::get('visitor/users', [UserController::class, 'visitorUserList'])->name('visitor.user.list');
Route::get('visitor/viewinb/{profile}', [ProfileController::class, 'visitorShow'])->name('visitor.view.profile');


//User

Route::get('/users', [UserController::class, 'userList'])->name('user.user.list');
Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
Route::get('dashboard', [UserController::class,('loggedIn')])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


//ADMIN
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/users', [AdminController::class, 'adminUserList'])->name('admin.user.list');
Route::get('admin/newsitems', [AdminController::class, 'adminItems'])->name('admin.items');

Route::put('admin/users/{user}/appoint', [AdminController::class, 'appointAdmin'])->name('appoint.admin');




require __DIR__.'/auth.php';
//layout.navigation.blade contains dropdown menu