<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

Route::get('/contact', [ContactsController::class, 'index'])->name('contact.index');
//問い合わせフォーム→情報get

Route::post('/contact/confirm', [ContactsController::class, 'confirm'])->name('contact.confirm');
//確認ページ→送信

Route::post('/contact/process', [ContactsController::class, 'process'])->name('contact.process');
//修正ページ

Route::get('/contact/complete', [ContactsController::class, 'complete'])->name('contact.complete');
//完了


Route::get('/contact/admin', [ContactsController::class, 'top'])->name('admin.top');
Route::post('/contaadmin/delete/{id?}', [ContactsController::class, 'delete'])->name('admin.delete');
//管理ページ
