<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypingTestController;
use App\Http\Controllers\Api\TypingTestApiController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SitemapController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog.index');
    Route::get('/blog/{blog}', 'show')->name('blog.show');
    Route::post('/blog/{blog}/like', 'like')->name('blog.like');
    Route::post('/blog/{blog}/comment', 'comment')->name('blog.comment');
    Route::post('/blog/{blog}/comment/{comment}/like', 'likeComment')->name('blog.comment.like');
    Route::get('/blog/{blog}/comments', 'comments')->name('blog.comments');
    Route::post('/blog/{blog}/comment/{comment}/reply', 'reply')
        ->name('blog.comment.reply');
});

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');
Route::get('/katalog/{catalog}', [KatalogController::class, 'show'])->name('catalogs.show');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::get('/typing-test', [TypingTestController::class, 'show'])->name('typingtest');
Route::get('/api/typing-scores', [TypingTestApiController::class, 'index']);
Route::post('/api/typing-scores', [TypingTestApiController::class, 'store']);


Route::get('/sitemap', [SitemapController::class, 'index']);
