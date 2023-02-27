<?php


use App\Http\Controllers\websitecontroller;
use App\Http\Controllers\CustomerController;
use App\Mail\ContactMail;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MyCartController;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\UserController;
use App\Http\Controllers\stripecontroller;
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
    session()->put(['loginCustomerId']);
    return view('home');
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
Route::get('/restaurant-list', function () {
    return view('restaurant-list');
});
Route::get('/restaurant-login', function () {
    return view('restaurant-login');
});
// for super admin
Route::get('/dashboard',[SuperAdmin::class,'dashboard']);
Route::post('/dashboard/add-location',[SuperAdmin::class,'addLocation'])->name('add-location');
//for restaurant
Route::get('/restaurant-page/{id}',[RestaurantController::class,'userRestaurantPage']);
Route::post('/restaurants-sort-asc',[RestaurantController::class,'sortRestaurantAsc'])->name('sort-restaurant-ascending');
Route::post('/restaurants-sort-desc',[RestaurantController::class,'sortRestaurantDesc'])->name('sort-restaurant-descending');
Route::post('/close-restaurant',[RestaurantController::class,'closeRestaurant'])->name('close-restaurant');
Route::post('/open-restaurant',[RestaurantController::class,'openRestaurant'])->name('open-restaurant');
Route::get('/logout-restaurant',[RestaurantController::class,'logoutRestaurant']);
Route::get('/restaurant-admin-page/{id}',[RestaurantController::class,'adminRestaurantPage']);
Route::get('/restaurant-signup2/{id}',[RestaurantController::class,'findRestaurantName']);
Route::get('/restaurant-signup3/{id}',[RestaurantController::class,'findRestaurantName1']);
Route::post('/restaurant-page',[RestaurantController::class,'searchRestaurant'])->name('search-restaurant');
Route::post('/restaurant-signup1',[RestaurantController::class,'registerRestaurantName'])->name('save-restaurant-name');
Route::post('/restaurant-signup2',[RestaurantController::class,'saveRestaurantDetail'])->name('save-restaurant-detail');
Route::post('/restaurant-signup3',[RestaurantController::class,'saveRestaurantLoginInfo'])->name('save-restaurant-loginInfo');
// Route::post('/restaurant-admin-page',[RestaurantController::class, 'updateRestaurantLoginInfo'])->name('update-restaurant-loginInfo');
Route::post('/restaurant-admin-page',[RestaurantController::class, 'updateRestaurantInfo'])->name('update-Restaurant-Info');
Route::post('/restaurant-admin-page/editFoodInfo',[FoodController::class,'updateFoodInfo'])->name('update-food-Info');
Route::post('/restaurant-admin-page/updateRestaurantCoverImg',[RestaurantController::class,'changeRestaurantCoverImg'])->name('changeBackgroundImg');
Route::post('/restaurant-admin-page/deleteRestaurantCoverImg',[RestaurantController::class,'deleteRestaurantCoverImg'])->name('deleteBackgroundImg');
Route::post('/restaurant-admin-page/updateRestaurantProfileImg',[RestaurantController::class,'changeRestaurantProfileImg'])->name('changeProfileImg');
Route::post('/restaurant-admin-page/deleteRestaurantProfileImg',[RestaurantController::class,'deleteRestaurantProfileImg'])->name('deleteProfileImg');
// for Customer
Route::get('/user-profile',[CustomerController::class,'userProfile']);
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
Route::get('/contact-us',[ContactController::class,'contact']);
Route::get('/Login',[UserController::class,'login']);
Route::post('/send-message',[ContactController::class,'sendEmail'])->name('contact.send');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
// for Add to cart
Route::post('/restaurant-page/addToCart',[MyCartController::class,'addToCart'])->name('add-to-cart');
Route::post('/my-cart',[MyCartController::class,'myCart']);
Route::post('/checkout',[MyCartController::class,'checkout'])->name('go-checkout-page');
Route::post('/checkout/save-checkout-info',[MyCartController::class,'saveCheckoutInfo'])->name('save-checkout-info');
Route::post('/stripecontroller',[Stripe::class,"stripePayment"])->name("stripe.post");
