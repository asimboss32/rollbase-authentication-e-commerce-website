<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[FrontendController::class,'index']);
Route::get('/shop',[FrontendController::class,'shopProducts']);
Route::get('/product-details',[FrontendController::class,'productDetails']);
Route::get('/privacy-policy',[FrontendController::class,'privacyPolicy']);
Route::get('/terms-conditions',[FrontendController::class,'termsConditions']);
Route::get('/refund-policy',[FrontendController::class,'refundPolicy']);
Route::get('/payment-policy',[FrontendController::class,'paymentPolicy']);
Route::get('/about-us',[FrontendController::class,'aboutUs']);
Route::get('/contact-us',[FrontendController::class,'contactUs']);
Route::get('/view-cart',[FrontendController::class,'viewCart']);
Route::get('/checkout',[FrontendController::class,'checkOut']);
Route::get('/order-confirmation',[FrontendController::class,'orderConfirmation']);
Route::get('/category-products',[FrontendController::class,'categoryProducts']);
Route::get('/subcategory-products',[FrontendController::class,'subCategoryProducts']);
Route::get('/type-products',[FrontendController::class,'typeProducts']);

