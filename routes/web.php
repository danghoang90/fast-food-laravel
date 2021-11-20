<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/login', [LoginController::class, 'showFormLogin'])->name('formLogin');
//Route::post('/login', [LoginController::class, 'login'])->name('customer.login');
//Route::get('logout', [LoginController::class,'logout'])->name('auth.logout');
//
//Route::get('/register', [RegisterController::class, 'showFormRegister'])->name('formRegister');
//Route::post('/register', [RegisterController::class, 'register'])->name('register');
//
//Route::get('change-password', [LoginController::class, 'showFormChangePassword'])->name('change.form');
//Route::post('change-password', [LoginController::class, 'changePassword'])->name('change.password');
//
//Login
Route::get('/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('users.authLogin');

Route::get('/auth/redirect/{provider}', [SocialController::class,'redirect']);
Route::get('/callback/{provider}', [SocialController::class,'callback']);


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::prefix('users')->group(function () {
        //listUser
        Route::get('list', [UserController::class, 'index'])->name('users.index');
        //CreateUser
        Route::get('create', [UserController::class, 'create'])->name('users.add');
        Route::post('create', [UserController::class, 'store'])->name('users.postAdd');
        //DeleteUser
        Route::get('{id}/delete', [UserController::class, 'destroy'])->name('users.delete');
        //EditUser
        Route::get('{id}/update', [UserController::class, 'update'])->name('users.update');
        Route::post('{id}/update', [UserController::class, 'edit'])->name('users.edit');
        //ChangePassWord
        Route::get('change-password', [UserController::class, 'showFormChangePassword'])->name('users.changeForm');
        Route::post('change-password', [UserController::class, 'changePassword'])->name('users.changePassword');
        //Logout
        Route::get('logout', [UserController::class, 'logout'])->name('users.logout');


    });

    Route::prefix('foods')->group(function () {
        //listFood
        Route::get('/', [\App\Http\Controllers\FoodController::class, 'index'])->name('foods.list');
        //CreateFood
        Route::get('create', [\App\Http\Controllers\FoodController::class, 'create'])->name('foods.add');
        Route::post('create', [\App\Http\Controllers\FoodController::class, 'store'])->name('foods.postAdd');
        //DeleteFood
        Route::get('{id}/delete', [\App\Http\Controllers\FoodController::class, 'destroy'])->name('foods.delete');
        //EditFood
        Route::get('{id}/update', [\App\Http\Controllers\FoodController::class, 'update'])->name('foods.update');
        Route::post('{id}/update', [\App\Http\Controllers\FoodController::class, 'edit'])->name('foods.edit');
        //search
        Route::get('search', [\App\Http\Controllers\FoodController::class, 'search'])->name('foods.search');
        //DetailFood
        Route::get('{id}/detail', [\App\Http\Controllers\FoodController::class, 'detailFood'])->name('foods.detail');

    });

    Route::prefix('Categories')->group(function () {
        //listCategory
        Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.list');
        //CreateCategory
        Route::get('create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.add');
        Route::post('create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.postAdd');
        //DeleteCategory
        Route::get('{id}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
        //EditCategory
        Route::get('{id}/update', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
        Route::post('{id}/update', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    });
});


////home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::prefix('home')->group(function () {
    //search
    Route::get('search', [\App\Http\Controllers\HomeController::class, 'search'])->name('home.search');
    //List
    Route::get('/bestSell', [HomeController::class, 'bestSell'])->name('home.bestSell');
    Route::get('/discount', [HomeController::class, 'discount'])->name('home.discount');
    Route::get('/fastFood', [HomeController::class, 'fastFood'])->name('home.fastFood');




});
Route::prefix('cart')->group(function () {
    Route::get('/addProduct/{id}', [CartController::class, 'addCart'])->name('cart.addCart');
    Route::get('/showCart', [CartController::class, 'showCart'])->name('cart.showCart');
    Route::get('/updateCart', [CartController::class, 'updateCart'])->name('cart.updateCart');
    Route::get('/deleteCart', [CartController::class, 'deleteCart'])->name('cart.deleteCart');
    Route::get('/order', [CartController::class, 'order'])->name('cart.order');
    Route::get('/payment', [CartController::class, 'payment'])->name('cart.payment');

});

Route::prefix('customers')->group(function () {
    Route::get('/login', [CustomerController::class, 'showFormLogin'])->name('customers.showFormLogin');
    Route::post('/login', [CustomerController::class, 'login'])->name('customers.login');
    Route::post('/register', [CustomerController::class, 'register'])->name('customers.register');
    Route::get('/register', [CustomerController::class, 'login'])->name('customers.register');
    Route::get('/logout', [CustomerController::class, 'logout'])->name('customers.logout');

});
