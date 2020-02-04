<?php

use App\Http\Controllers\Admin\{
    AdminClientController, AdminContactController, AdminPageController, AdminPartnerController,
    AdminPortfolioController, AdminPortfolioImageController, AdminController
};
use App\Http\Controllers\{
    ContactController, PageController, PartnerController, PortfolioController, PortfolioImageController
};


Route::group(['middleware' => ['web'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
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
       });
   });
});
Route::get('/', function () {
    return view('welcome');
});
