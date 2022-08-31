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

Route::get('/', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index'])->middleware(['auth','verified']);
Route::get('/posts/{post}', [PostController::class, 'show'])->middleware(['auth','verified']);
Route::get('/category/{category}', [PostController::class, 'category'])->middleware(['auth','verified']);
Route::get('/user/{user}', [PostController::class, 'user'])->middleware(['auth','verified']);


Route::group(['namespace' => 'Subscriptions'], function() {
    Route::get('plans', [SubscriptionController::class, 'index'])->name('plans')->middleware(['auth','verified']);
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments')->middleware(['auth','verified']);
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store')->middleware(['auth','verified']);
});


Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('edit')->middleware(['auth','verified']);

Route::post('newsletter', NewsletterController::class);
Route::post('ckeditor/image_upload', [CKEditorController::class, 'store'])->name('ckeditor.upload')->middleware(['auth','verified']);

Route::middleware([CheckIfPaied::class])->group(function() {
    Route::get('post/create', [PostController::class, 'create'])->middleware('auth');
});

Route::post('post', [PostController::class, 'store'])->name('post.store')->middleware(['auth','verified']);

Route::put('posts/{post}', [PostController::class, 'update'])->name('updatePost');

Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('profile/{user}/edit', [SessionsController::class, 'profile_page'])->middleware(['auth','verified']);
Route::put('profile/{user}/edit', [SessionsController::class, 'update'])->name('profile.update')->middleware(['auth','verified']);

//Route::get('change/{user}/password',  [ChangePasswordController::class,'getPageChangePassword'])->middleware(['auth','verified']);
//Route::post('change/{user}/password',  [ChangePasswordController::class,'changePassword'])->name('profile.change.password')->middleware(['auth','verified']);

Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

require __DIR__.'/auth.php';
