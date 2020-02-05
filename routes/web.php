<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\{
    AdminContactController, AdminPageController, AdminPartnerController,
    AdminPortfolioController, AdminPortfolioImageController, AdminController
};
use App\Http\Controllers\{
    ContactController, PageController, PartnerController, PortfolioController, PortfolioImageController
};

Route::group(['middleware' => ['web']], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => ['web'], 'prefix' => 'admin', 'as' => 'admin.'], function () { //todo admin middleware

    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::group(['prefix' => 'portfolios', 'as' => 'portfolios.'], function () {
        Route::get('create', [AdminPortfolioController::class, 'create'])->name('create');
        Route::post('', [AdminPortfolioController::class, 'store'])->name('store');
        Route::get('', [AdminPortfolioController::class, 'index'])->name('index');
        Route::group(['prefix' => '{portfolio}'], function () {
            Route::get('edit', [AdminPortfolioController::class, 'edit'])->name('edit');
            Route::put('', [AdminPortfolioController::class, 'update'])->name('update');
            Route::delete('', [AdminPortfolioController::class, 'destroy'])->name('destroy');
            Route::resource('images', 'Admin\AdminPortfolioImageController', ['parameters' => ['image' => 'portfolioImage']]);
            Route::post('files', [AdminPortfolioImageController::class, 'storeFiles'])->name('store_files');
       });
    });
    Route::resource('partners', 'Admin\AdminPartnerController');
    Route::resource('contacts', 'Admin\AdminContactController');
    Route::resource('pages', 'Admin\AdminPageController');
});

Route::get('/', function () {
    return view('welcome');
});
