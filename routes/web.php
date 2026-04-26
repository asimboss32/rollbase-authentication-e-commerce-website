<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LoginController;
use Illuminate\Support\Facades\Auth;
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

//Login and Register Routes

Route::get('/admin/login',[LoginController::class,'adminLogin']);
Route::post('/admin/login/auth', [LoginController::class, 'adminLoginAuth']); //jehetu form submit hobe tai eta post method

//employee
Route::get('/employee/login',[LoginController::class,'employeeLogin']);
Route::post('/employee/login/auth', [LoginController::class, 'employeeLoginAuth']);

//customer
Route::get('/customer/login',[LoginController::class,'customerLogin']);
Route::post('/customer/login/auth', [LoginController::class, 'customerLoginAuth']);

Auth::routes(['login' => false, 'register' => false]); //default auth routes gulo disable kora holo karon amra custom login and register route use korchi.

//Admin and Employee Dashboard Routes with Role Middleware
route::middleware(['role:admin'])->group(function(){  //eta middleware group jekhane  role middleware use kora hocche. mane je route gulo er moddhe thakbe segulo access korte hole user ke login thakte hobe and tar role admin hote hobe.
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']); //admin dashboard route jekhane admin login korar por niye jabe.
    route::get('/admin/logout',[AdminController::class,'adminLogout']); //admin logout route jekhane admin logout korar por niye jabe.

    //Category Routes
    Route::get('/manage/category/create', [CategoryController::class, 'createCategory']);
    Route::post('/manage/category/store', [CategoryController::class, 'storeCategory']);
    Route::get('/manage/category/list', [CategoryController::class, 'listCategory']);
    Route::get('/manage/category/edit/{id}', [CategoryController::class, 'editCategory']);
    Route::post('/manage/category/update/{id}', [CategoryController::class, 'updateCategory']);
    Route::get('/manage/category/delete/{id}', [CategoryController::class, 'deleteCategory']);

    //SubCategory Routes
    Route::get('/manage/subcategory/create', [SubCategoryController::class, 'createSubCategory']);
    Route::post('/manage/subcategory/store', [SubCategoryController::class, 'storeSubCategory']);
    Route::get('/manage/subcategory/list', [SubCategoryController::class, 'listSubCategory']);
    Route::get('/manage/subcategory/edit/{id}', [SubCategoryController::class, 'editSubCategory']);
    Route::post('/manage/subcategory/update/{id}', [SubCategoryController::class, 'updateSubCategory']);
    Route::get('/manage/subcategory/delete/{id}', [SubCategoryController::class, 'deleteSubCategory']);
});

//employee
route::middleware(['role:employee'])->group(function(){ 
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard']); 
    route::get('/employee/logout',[EmployeeController::class,'employeeLogout']); 
});

//customer
route::middleware(['role:customer'])->group(function(){ 
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard']); 
    route::get('/customer/logout',[CustomerController::class,'customerLogout']); 
});
