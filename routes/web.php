<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SopController;
use App\Http\Controllers\User\ArticleController;
use App\Http\Controllers\User\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', function () {
    return view('user/pages/home/index');
});

Route::get('/kopetensi-keahlian', [UserDashboardController::class, 'majors'])->name('majors');
Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/{gallery}', [GalleryController::class, 'show'])->name('galleries.show');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [AdminArticleController::class, 'show'])->name('articles.show');

// export resume to pdf
Route::get('/resumes/{resume}/export', [ResumeController::class, 'exportPdf'])->name('resumes.export');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboardUser'])->name('dashboard.user');
    // Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // articles
    Route::resource('articles-user', ArticleController::class);
    Route::patch('articles/{article}/toggle-status', [AdminArticleController::class, 'toggleStatus'])
        ->name('articles.toggleStatus');

    // resume
    Route::get('/resumes/create', [ResumeController::class, 'create'])->name('resumes.create');
    Route::post('/resumes', [ResumeController::class, 'store'])->name('resumes.store');
    Route::get('/resumes/{resume}/edit', [ResumeController::class, 'edit'])->name('resumes.edit');
    Route::put('/resumes/{resume}', [ResumeController::class, 'update'])->name('resumes.update');
    Route::get('/resumes/{resume}', [ResumeController::class, 'show'])->name('resumes.show');

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        // dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // manage user
        Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('users/export/csv', [AdminUserController::class, 'exportCsv'])->name('users.export.csv');

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

        // resumes
        Route::get('resumes', [ResumeController::class, 'index'])->name('resumes.index');
        Route::get('resumes/{resume}', [ResumeController::class, 'showAdmin'])->name('resumes.showAdmin');
        Route::get('resumes/{resume}/export', [ResumeController::class, 'exportPdfInAdmin'])->name('resumes.exportInAdmin');

        // sops
        Route::resource('sops', SopController::class);
    });
});

require __DIR__ . '/auth.php';
