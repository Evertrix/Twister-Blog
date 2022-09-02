<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\Subscriptions\PaymentController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
use App\Http\Middleware\CheckIfPaied;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(PostController::class)->group(function() {
    Route::get('/',  'index');
    Route::get('/posts', 'index')->middleware(['auth','verified']);
    Route::get('/posts/{post}', 'show')->middleware(['auth','verified']);
    Route::get('/category/{category}', 'category')->middleware(['auth','verified']);
    Route::get('/user/{user}', 'user')->middleware(['auth','verified']);

    Route::post('post', 'store')->name('post.store')->middleware(['auth','verified']);
    Route::put('posts/{post}', 'update')->name('updatePost');
    Route::get('posts/{post}/edit', 'edit')->name('edit')->middleware(['auth','verified']);
    Route::delete('posts/{post}', 'destroy')->name('post.destroy');
});


Route::group(['namespace' => 'Subscriptions'], function() {
    Route::get('plans', [SubscriptionController::class, 'index'])->name('plans')->middleware(['auth','verified']);
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments')->middleware(['auth','verified']);
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store')->middleware(['auth','verified']);
});

Route::post('newsletter', NewsletterController::class);
Route::post('ckeditor/image_upload', [CKEditorController::class, 'store'])->name('ckeditor.upload')->middleware(['auth','verified']);

Route::middleware([CheckIfPaied::class])->group(function() {
    Route::get('post/create', [PostController::class, 'create'])->middleware('auth');
});

Route::get('profile/{user}/edit', [SessionsController::class, 'profile_page'])->middleware(['auth','verified']);
Route::put('profile/{user}/edit', [SessionsController::class, 'update'])->name('profile.update')->middleware(['auth','verified']);

Route::post('/comments', [CommentController::class, 'storeComment'])->name('comments.store');
Route::post('/reply', [CommentController::class, 'storeReply'])->name('reply.store');

require __DIR__.'/auth.php';
