<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FoodController;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

Route::get('/', function () {
    session()->put(['loginCustomer']);
    return view('home');
});
Route::get('/dashboard', function () {
    return view('backend/dashboard');
});
Route::get('/login', function () {
    return view('user-login-page');
});
Route::get('/signup', function () {
    return view('signup-page');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/restaurant-signup1', function () {
    return view('restaurant-signup-page1');
});
Route::get('/restaurant-page', function () {
    return view('restaurant-page');
});
Route::get('/restaurant-list', function () {
    return view('restaurant-list');
});
Route::get('/restaurant-login', function () {
    return view('restaurant-login');
});
//for restaurant
Route::post('/restaurants-sort-asc',[RestaurantController::class,'sortRestaurantAsc'])->name('sort-restaurant-ascending');
Route::post('/restaurants-sort-desc',[RestaurantController::class,'sortRestaurantDesc'])->name('sort-restaurant-descending');
Route::get('/restaurant-admin-page/{id}',[RestaurantController::class,'adminRestaurantPage']);
Route::get('/restaurant-signup2/{id}',[RestaurantController::class,'findRestaurantName']);
Route::get('/restaurant-signup3/{id}',[RestaurantController::class,'findRestaurantName1']);
Route::post('/restaurant-page',[RestaurantController::class,'searchRestaurant'])->name('search-restaurant');
Route::post('/restaurant-signup1',[RestaurantController::class,'registerRestaurantName'])->name('save-restaurant-name');
Route::post('/restaurant-signup2',[RestaurantController::class,'saveRestaurantDetail'])->name('save-restaurant-detail');
Route::post('/restaurant-signup3',[RestaurantController::class,'saveRestaurantLoginInfo'])->name('save-restaurant-loginInfo');
Route::post('/restaurant-admin-page/updateRestaurantCoverImg',[RestaurantController::class,'changeRestaurantCoverImg'])->name('changeBackgroundImg');
Route::post('/restaurant-admin-page/deleteRestaurantCoverImg',[RestaurantController::class,'deleteRestaurantCoverImg'])->name('deleteBackgroundImg');
Route::post('/restaurant-admin-page/updateRestaurantProfileImg',[RestaurantController::class,'changeRestaurantProfileImg'])->name('changeProfileImg');
Route::post('/restaurant-admin-page/deleteRestaurantProfileImg',[RestaurantController::class,'deleteRestaurantProfileImg'])->name('deleteProfileImg');
// for Customer
Route::post('/login',[CustomerController::class,'loginUser'])->name('login-user');
Route::get('/logout',[CustomerController::class,'logout']);
Route::post('/signup',[CustomerController::class,'registerUser'])->name('register-user');
Route::get('auth/google',[CustomerController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[CustomerController::class,'callbackGoogle']);
// for food
Route::post('/restaurant-admin-page/saveFoodInfo',[FoodController::class,'saveFood'])->name('save-food-info');
Route::get('make-food-unavailable/{id}',[FoodController::class,'makeFoodUnavailable']);
Route::get('restore-food/{id}',[FoodController::class,'restoreFood']);
Route::get('force-delete-food/{id}',[FoodController::class,'forceDeleteFood']);

