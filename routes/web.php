<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SopController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\User\ArticleController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\User\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::get('/', function () {
    return view('user/pages/home/index');
});

Route::get('/kopetensi-keahlian', [UserDashboardController::class, 'majors'])->name('majors');
Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/{gallery}', [GalleryController::class, 'show'])->name('galleries.show');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [AdminArticleController::class, 'show'])->name('articles.show');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboardUser'])->name('dashboard.user');
    // Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // articles
    Route::resource('articles-user', ArticleController::class);
    Route::patch('articles/{article}/toggle-status', [AdminArticleController::class, 'toggleStatus'])
            ->name('articles.toggleStatus');

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        // dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // categories
        Route::resource('categories', CategoryController::class);

        // articles
        Route::resource('articles', AdminArticleController::class);
        Route::patch('articles/{article}/toggle-status', [AdminArticleController::class, 'toggleStatus'])
            ->name('articles.toggleStatus');

        // gallery
        Route::resource('galleries', AdminGalleryController::class);
        Route::delete('galleries/images/{galleryImage}', [AdminGalleryController::class, 'destroyImage'])
            ->name('galleries.images.destroy');

        // sops
        Route::resource('sops', SopController::class);
    });
});

require __DIR__ . '/auth.php';
