<?php

use App\Http\Controllers\AboutsPagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactPagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PortfolioCategoriesController;
use App\Http\Controllers\ServicesPagesController;
use App\Http\Controllers\portfoliosPagesController;
use App\Models\category;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [PagesController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [MainPageController::class, 'admin'])->name('admin.dashboard');
    Route::get('/main', [MainPageController::class, 'index'])->name('admin.main');
    Route::PUT('/main', [MainPageController::class, 'update'])->name('admin.main.update');
    Route::get('/services/create', [ServicesPagesController::class, 'create'])->name('admin.services.create');
    Route::POST('/services/create', [ServicesPagesController::class, 'store'])->name('admin.services.store');
    Route::get('/services/list', [ServicesPagesController::class, 'list'])->name('admin.services.list');
    Route::get('/services/edit/{id}', [ServicesPagesController::class, 'edit'])->name('admin.services.edit');
    Route::POST('/services/update/{id}', [ServicesPagesController::class, 'update'])->name('admin.services.update');
    Route::DELETE('/services/destroy/{id}', [ServicesPagesController::class, 'destroy'])->name('admin.services.destroy');

    Route::get('/portfolios/create', [portfoliosPagesController::class, 'create'])->name('admin.portfolios.create');
    Route::PUT('/portfolios/create', [portfoliosPagesController::class, 'store'])->name('admin.portfolios.store');
    Route::get('/portfolios/list', [portfoliosPagesController::class, 'list'])->name('admin.portfolios.list');
    Route::get('/portfolios/edit/{id}', [portfoliosPagesController::class, 'edit'])->name('admin.portfolios.edit');
    Route::POST('/portfolios/update/{id}', [portfoliosPagesController::class, 'update'])->name('admin.portfolios.update');
    Route::DELETE('/portfolios/destroy/{id}', [portfoliosPagesController::class, 'destroy'])->name('admin.portfolios.destroy');




    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::PUT('/categories/create', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/list', [CategoryController::class, 'list'])->name('admin.categories.list');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::POST('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::DELETE('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Route::get('/portfolios/category/{id}', [PortfolioCategoriesController::class, 'getByCategory'])->name('portfolios.category');

    Route::get('/abouts/create', [AboutsPagesController::class, 'create'])->name('admin.abouts.create');
    Route::PUT('/abouts/create', [AboutsPagesController::class, 'store'])->name('admin.abouts.store');
    Route::get('/abouts/list', [AboutsPagesController::class, 'list'])->name('admin.abouts.list');
    Route::get('/abouts/edit/{id}', [AboutsPagesController::class, 'edit'])->name('admin.abouts.edit');
    Route::POST('/abouts/update/{id}', [AboutsPagesController::class, 'update'])->name('admin.abouts.update');
    Route::DELETE('/abouts/destroy/{id}', [AboutsPagesController::class, 'destroy'])->name('admin.abouts.destroy');
});


Route::POST('/contact', [ContactPagesController::class, 'store'])->name('contact.store');



Auth::routes();

//  Route::get('/home', [HomeController::class, 'index'])->name('home');
