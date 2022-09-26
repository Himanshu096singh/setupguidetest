<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SociallinkController;
use App\Http\Controllers\Admin\SetupController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;

Route::middleware(['is_admin'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
    Route::get('/settings',[AdminController::class,'settings'])->name('websettings');
    Route::post('/savesettings',[AdminController::class,'savesettings'])->name('savesettings');
    Route::get('/code',[AdminController::class,'code'])->name('code');
    Route::post('/savecode',[AdminController::class,'savecode'])->name('savecode');

    Route::get('/category/deletedrecords',[CategoryController::class, 'deletedrecords' ])->name('category.deletedrecords');
    Route::get('/category/restore/{id}',[CategoryController::class, 'restorerecords' ])->name('category.restore');
    Route::resource('category',CategoryController::class);
    
    Route::get('/company/deletedrecords',[CompanyController::class, 'deletedrecords' ])->name('company.deletedrecords');
    Route::get('/company/restore/{id}',[CompanyController::class, 'restorerecords' ])->name('company.restore');
    Route::post('/company/savefaq',[CompanyController::class, 'savefaq'])->name('company.faq');
    Route::resource('company',CompanyController::class);

    Route::get('/product/deletedrecords',[ProductController::class, 'deletedrecords' ])->name('product.deletedrecords');
    Route::get('/product/restore/{id}',[ProductController::class, 'restorerecords' ])->name('product.restore');
    Route::post('/getcompany',[ProductController::class,'getcompany'])->name('product.getcompany');
    Route::post('/getproduct',[ProductController::class,'getproduct'])->name('product.getproduct');
    
    Route::post('/product/savefaq',[ProductController::class, 'savefaq'])->name('product.faq');
    Route::resource('product',ProductController::class);

    Route::resource('setup',SetupController::class);

    Route::post('/posts/savefaq',[PostController::class, 'savefaq'])->name('posts.faq');
    Route::resource('posts',PostController::class);
    // Route::get('/getcompany/{id}', [PostController::class, 'loadcompany'])->name('post.getcompany');

    
    Route::resource('sociallink',SociallinkController::class);

}); 

Route::middleware(['is_user'])->prefix('/user')->name('user.')->group(function () {
    Route::get('/dashboard',[UserController::class, 'index'])->name('dashboard');
});


Route::redirect('admin','login');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
Auth::routes();
Route::post('/ajaxlogin', [LoginController::class, 'ajaxlogin'])->name('ajaxlogin');


Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

// Route::get('/home', [HomeController::class, 'index'])->name('index');

Route::get('/',[FrontController::class, 'index'])->name('home');
Route::get('about-us',[FrontController::class,'about'])->name('about');
Route::get('contact-us',[FrontController::class,'contact'])->name('contact');
Route::get('all-categories',[FrontController::class,'category'])->name('category');
Route::get('blog',[FrontController::class,'blog'])->name('blog');
Route::get('how-to-setup',[FrontController::class,'setup'])->name('setup');
Route::get('how-to-setup/{slug}',[FrontController::class,'setupdetail'])->name('setupdetail');
Route::get('blog/{slug}',[FrontController::class,'blogdetail'])->name('blogdetail');
Route::get('{slug1}/{slug2}/{slug3}',[FrontController::class,'productdetails'])->name('product');
Route::get('{slug1}/{slug2}',[FrontController::class,'companydetail'])->name('company');
Route::get('{slug}',[FrontController::class,'detail'])->name('detail');
Route::post('imageupload', [FrontController::class, 'storeImage'])->name('imageupload');
Route::post('submitcontact', [FrontController::class, 'submitcontact'])->name('submitcontact');


