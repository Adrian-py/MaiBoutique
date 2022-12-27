<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionController;

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

// All members (not logged in)
Route::middleware(['guest'])->group(function() {
    // Welcome page
    Route::get('/', function () {
        return view('pages.welcome');
    });

    // Login
    Route::get("/login", [LoginController::class, "index"])->name("view-login");
    Route::post("/login", [LoginController::class, "login"])->name("login");

    // Register
    Route::get("/register", [RegisterController::class, "index"])->name("view-register");
    Route::post("/register", [RegisterController::class, "register"])->name("register");
});

// All authenticated users (members & admins)
Route::middleware(['auth'])->group(function() {
    // Logout
    Route::post('/logout', [LogoutController::class, "logout"])->name("logout");

    // Homepage
    Route::get("/home", [HomeController::class, "index"])->name("home");

    // Create product page (admin only)
    Route::middleware(['admin'])->group(function() {
        // add view
        // ....
    });

    // Detail Page
    Route::get("/product/{product:slug}", [ProductController::class, "index"])->name("view-product");

    // Cart Page
    Route::prefix('cart')->group(function(){
        Route::get("/", [CartController::class, "index"])->name('view-cart');
        Route::post("/add", [CartController::class, "add"])->name('add-cart');
        Route::get("/edit/{product:slug}", [CartController::class, "edit"])->name('view-edit-cart');
        Route::post("/edit/{product:slug}", [CartController::class, "update"])->name('edit-cart');
        Route::post("/delete/{product:slug}", [CartController::class, "delete"])->name('delete-cart');
        Route::post("/checkout", [CartController::class, "checkout"])->name("checkout");
    });

    // Transaction Page
    Route::prefix('transaction')->group(function(){
        Route::get("/", [TransactionController::class, "index"])->name('view-transaction');
    });

    // Profile Page
    Route::prefix('profile')->group(function(){
        Route::get("/", [ProfileController::class, "index"])->name('view-profile');
        Route::get("/edit/profile", [ProfileController::class, "editProfile"])->name('view-edit-profile');
        Route::post("/edit/profile", [ProfileController::class, "updateProfile"])->name('edit-profile');
        Route::get("/edit/password", [ProfileController::class, "editPassword"])->name('view-edit-password');
        Route::post("/edit/password", [ProfileController::class, "updatePassword"])->name('edit-password');
    });

    Route::prefix('search')->group(function(){
        Route::get("/", [SearchController::class, "index"])->name("search");
    });
});
