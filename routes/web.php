<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/blog', function () {
    return view('frontend.blog');
});
Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});
Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
});
Route::get('/summer', function () {
    return view('summer');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('about', AboutController::class);
    Route::resource('bank', BankController::class);
    Route::get('manifest', function () {
        return view('manifest');
    });
    // Portfolio Categories
    Route::resource('/category', CategoryController::class);
    // Portfolio Items
    Route::resource('portfolio-item', PortfolioItemController::class);
});

require __DIR__ . '/auth.php';
