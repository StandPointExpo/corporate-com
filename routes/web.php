<?php

use App\Language;
use App\Http\Controllers\Admin\{
    AdminContactController, AdminPageController, AdminPartnerController, AdminPortfolioController,
    AdminPortfolioImageController, AdminController, AdminGuestLetterController,
    LoginController
};
use App\Http\Controllers\{
    MainController,  ContactController, PortfolioController,
    PortfolioImageController, HomeController, LetterController
};

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::post('/send-email', [LetterController::class, 'send'])->name('send_mail');

Route::get('locale/{locale}', [MainController::class, 'changeLanguage'])->name('set_locale');

Route::group(['middleware' => ['web']], function () {
    Route::get('entrance', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('entrance', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('opening', [AdminController::class, 'index'])->name('index');
    Route::group(['prefix' => 'portfolios', 'as' => 'portfolios.'], function () {
        Route::get('create', [AdminPortfolioController::class, 'create'])->name('create');
        Route::post('', [AdminPortfolioController::class, 'store'])->name('store');
        Route::get('', [AdminPortfolioController::class, 'index'])->name('index');
        Route::group(['prefix' => '{portfolio}'], function () {
            Route::post('status', [AdminPortfolioController::class, 'changeStatus'])->name('change_status');
            Route::get('edit', [AdminPortfolioController::class, 'edit'])->name('edit');
            Route::put('', [AdminPortfolioController::class, 'update'])->name('update');
            Route::delete('', [AdminPortfolioController::class, 'destroy'])->name('destroy');
            Route::resource('images', 'Admin\AdminPortfolioImageController');
            Route::post('files', [AdminPortfolioImageController::class, 'storeFiles'])->name('store_files');
       });
    });
    Route::resource('partners', 'Admin\AdminPartnerController');
    Route::resource('contacts', 'Admin\AdminContactController');
    Route::resource('pages', 'Admin\AdminPageController');
    Route::group(['prefix' => 'pages/{page}/articles', 'as' => 'pages_articles.'], function () {
         Route::get('', [AdminPageController::class, 'articles'])->name('index');
         Route::get('create', [AdminPageController::class, 'createArticle'])->name('create');
         Route::get('{article}/edit', [AdminPageController::class, 'editArticle'])->name('edit');
         Route::post('', [AdminPageController::class, 'storeArticle'])->name('store');
         Route::put('{article}', [AdminPageController::class, 'updateArticle'])->name('update');
         Route::delete('{article}', [AdminPageController::class, 'deleteArticle'])->name('destroy');
    });
    Route::group(['prefix' => 'letters', 'as' => 'letters.'], function() {
        Route::get('', [AdminGuestLetterController::class, 'index'])->name('index');
        Route::delete('{letter}', [AdminGuestLetterController::class, 'destroy'])->name('destroy');
    });
});

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale(), 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => ['web', 'setLocate']], function() {

    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::get('/contacts', [ContactController::class,'index'])->name('contacts');

});

Route::get('/{any}', function () {
    return redirect()->route('main');
})->where('any', '.*');
