<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ItemController;
use \App\Http\Controllers\FAQController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\TagController;
use \App\Http\Controllers\MessageController;
use \App\Http\Controllers\MailController;

// Item Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('item/create-item', [ItemController::class, 'create'])->name('create-item');
    Route::get('/view/{item}', [ItemController::class, 'show'])->name('item.view');
    Route::get('/edit/{item}', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/update/{item}', [ItemController::class, 'update'])->name('item.update');
    Route::post('created', [ItemController::class, 'store'])->name('store');
    Route::delete('{item}', [ItemController::class, 'destroy'])->name('remove.item');
    Route::get('ok', [ItemController::class, 'show'])->name('item.like');
});

Route::resource('posts', ItemController::class);

// FAQ Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/FAQ', [FAQController::class, 'index'])->name('FAQ');
    Route::get('admin/faq', [FAQController::class, 'adminIndex'])->name('admin.faq');
    Route::get('admin/faq-create', [FAQController::class, 'create'])->name('admin.faq.create');
    Route::post('admin/faq-store', [FAQController::class, 'store'])->name('faq.store');
    Route::get('admin/faq/edit/{faq}', [FAQController::class, 'edit'])->name('faq.edit');
    Route::put('admin/faq/update/{faq}', [FAQController::class, 'update'])->name('faq.update');
    Route::delete('admin/faq/remove/{faq}', [FAQController::class, 'destroy'])->name('faq.remove');
});

// Tag Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('admin/cat-create', [TagController::class, 'index'])->name('admin.cat.create');
    Route::post('admin/cat-store', [TagController::class, 'store'])->name('cat.store');
    Route::get('admin/cat/edit/{tag}', [TagController::class, 'edit'])->name('cat.edit');
    Route::put('admin/cat/update/{tag}', [TagController::class, 'update'])->name('cat.update');
    Route::delete('admin/cat/remove/{tag}', [TagController::class, 'destroy'])->name('cat.remove');
});

// Profile Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('profile/view/{profile}', [ProfileController::class, 'show'])->name('view.profile');
    Route::get('profile/create-profile', [ProfileController::class, 'create'])->name('create.profile');
    Route::post('/store-profile', [ProfileController::class, 'store'])->name('store.profile');
    Route::get('profile/edit/{profile}', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::put('profile/update/{profile}', [ProfileController::class, 'update'])->name('update.profile');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// Visitor Routes
Route::get('/FAQ', [FAQController::class, 'index'])->name('FAQ');
Route::get('visitor/view/{item}', [ItemController::class, 'visitorShow'])->name('visitor.item.view');
Route::get('/about', [ItemController::class, 'about'])->name('about');
Route::get('visitor/users', [UserController::class, 'visitorUserList'])->name('visitor.user.list');
Route::get('visitor/viewinb/{profile}', [ProfileController::class, 'visitorShow'])->name('visitor.view.profile');
Route::get('/', [ItemController::class, 'visitorIndex'])->name('welcome');
Route::get('/contact', [MessageController::class, 'contact'])->name('contactform');
Route::post('contactform/send/{message}', [MessageController::class, 'sendContactForm'])->name('send.contact.form');

// User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UserController::class, 'userList'])->name('user.user.list');
    Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('dashboard', [UserController::class, 'loggedIn'])->name('dashboard');
});

// Admin Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/users', [AdminController::class, 'adminUserList'])->name('admin.user.list');
    Route::get('admin/newsitems', [AdminController::class, 'adminItems'])->name('admin.items');
    Route::put('admin/users/{user}/appoint', [AdminController::class, 'appointAdmin'])->name('appoint.admin');
});

// Message and Contact Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('view.message');
    Route::get('contactform/reply/{message}', [MessageController::class, 'contactReplyView'])->name('show.contactform.reply');
    Route::get('/reply/{message}', [MessageController::class, 'messageReplyView'])->name('show.message.reply');
    Route::get('message/send', [MessageController::class, 'messageSendView'])->name('show.message.send');
    Route::post('/send', [MessageController::class, 'store'])->name('store.message');
    Route::get('contactform/list', [MessageController::class, 'contactFormMessageList'])->name('list.contact.form.messages');
    Route::get('internalmessages/list', [MessageController::class, 'internalMessageList'])->name('list.internal.messages');
    Route::delete('messages/delete/{message}', [MessageController::class, 'destroy'])->name('remove.email');
});

// E-mail Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('mails/store/{message}', [MessageController::class, 'storeToMail'])->name('store.to.mail');
    Route::get('mail/send/{message}', [MailController::class, 'sendEmail'])->name('send.reply.mail');
    Route::get('mail/send', [MailController::class, 'replyContactForm'])->name('reply.contact.form');
});

require __DIR__.'/auth.php';