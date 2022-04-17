<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\Subscriptions\PaymentController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
use App\Http\Middleware\CheckIfPaied;
use App\Models\User;
use Illuminate\Support\Facades\Request;
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
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/category/{category}', [PostController::class, 'category']);
Route::get('/user/{user}', [PostController::class, 'user']);


Route::group(['namespace' => 'Subscriptions'], function() {
    Route::get('plans', [SubscriptionController::class, 'index'])->name('plans');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
});


Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('edit')->middleware('auth');

Route::post('newsletter', NewsletterController::class);
Route::post('ckeditor/image_upload', [CKEditorController::class, 'store'])->name('ckeditor.upload');

Route::middleware([CheckIfPaied::class])->group(function() {
    Route::get('post/create', [PostController::class, 'create'])->middleware('auth');
});

Route::post('post', [PostController::class, 'store'])->name('post.store')->middleware('auth');

Route::put('posts/{post}', [PostController::class, 'update'])->name('updatePost');

Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('profile/{user}/edit', [SessionsController::class, 'profile_page'])->middleware('auth');
Route::put('profile/{user}/edit', [SessionsController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('change/{user}/password',  [ChangePasswordController::class,'getPageChangePassword'])->middleware('auth');
Route::post('change/{user}/password',  [ChangePasswordController::class,'changePassword'])->name('profile.change.password')->middleware('auth');

Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

require __DIR__.'/auth.php';
