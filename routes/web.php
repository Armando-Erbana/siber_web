<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsAdminController;

/*
|--------------------------------------------------------------------------
| PUBLIC AREA (TANPA LOGIN) sesuai permintaan
|--------------------------------------------------------------------------
*/

Route::get('/', [NewsController::class, 'index'])->name('home');

Route::get('/news/{slug}', [NewsController::class, 'show'])
    ->name('news.show');

Route::get('/search', [NewsController::class, 'search'])
    ->name('news.search');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN, REGISTER, RESET PASSWORD) untuk admin
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| ADMIN AREA (WAJIB LOGIN) sesuai permintaann
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])
            ->name('dashboard');

        Route::resource('/news', NewsAdminController::class)
            ->except(['show'])
            ->names([
                'index'   => 'news.index',
                'create'  => 'news.create',
                'store'   => 'news.store',
                'edit'    => 'news.edit',
                'update'  => 'news.update',
                'destroy' => 'news.destroy',
            ]);
});