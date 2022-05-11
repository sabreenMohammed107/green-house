<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoryItemsController;
use App\Http\Controllers\CompanyContactController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HowToUseController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnersController as ControllersPartnersController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\UsersController as ControllersUsersController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ContactController as WebContactController;
use App\Http\Controllers\Web\HowUseController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\MyCartController;
use App\Http\Controllers\Web\MyItemsController;
use App\Http\Controllers\Web\MyOrderController;
use App\Http\Controllers\Web\MyPointController;
use App\Http\Controllers\Web\PartnersController;
use App\Http\Controllers\Web\TermsController;
use App\Http\Controllers\Web\UsersController;
use App\Http\Controllers\Web\UsersRegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------

--------------------------------------------*/


Route::get('/', [IndexController::class,'index']);
Route::post('/contact-message', [IndexController::class,'sendMessage']);
Route::get('/about', [AboutController::class,'index'])->name('about');
Route::get('/how-use', [HowUseController::class,'index'])->name('about');
Route::get('/partners', [PartnersController::class,'index']);
Route::get('partners/fetch_data', [PartnersController::class, 'fetch_data']);
Route::get('/terms-conditions', [TermsController::class,'index']);
Route::get('/contact', [WebContactController::class,'index'])->name('contact');
Route::post('/contact-messaging', [WebContactController::class,'sendMessage']);
Route::get('/user-login', [UsersController::class,'login'])->name('user-login');
Route::post('/save-user', [UsersController::class,'saveLogin'])->name('save-user');
Route::get('/user-register', [UsersController::class,'register']);

Route::post('/sign-user', [UsersRegisterController::class,'signUp'])->name('sign-user');

Route::post('/user-logout', [UsersController::class,'logout'])->name('user-logout');

Route::get('/my-cart', [MyCartController::class,'index']);

//addQty/fetch
Route::get('addQty/fetch',[MyCartController::class,'addQty'])->name('addQty/fetch');
Route::get('subQty/fetch',[MyCartController::class,'subQty'])->name('subQty/fetch');
Route::get('del/orderItem',[MyCartController::class,'delOrderItem'])->name('del/orderItem');

Route::post('/place-order', [MyCartController::class,'palceOrder'])->name('place-order');



//orders
Route::get('/my-orders', [MyOrderController::class,'index']);
Route::get('order_details/{id}',  [MyOrderController::class,'details'])->name('order_details');

//items
Route::resource('/my-items', MyItemsController::class);
Route::get('items-cart/{id}',  [MyItemsController::class,'cart'])->name('items-cart');

//point
Route::get('/my-points', [MyPointController::class,'index']);
//get-point
Route::get('get-point/{id}',  [MyPointController::class,'getPoint'])->name('get-point');





// Route::middleware(['auth', 'user-access:user'])->group(function () {

    // Route::get('/home', [HomeController::class, 'index'])->name('home');

// });

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
     //admin-company
     Route::resource('/admin-company', CompanyController::class);
     //admin-company-contact
     Route::resource('/admin-company-contact', CompanyContactController::class);
     //users
     Route::resource('/admin-users', ControllersUsersController::class);
     Route::get('/admin-users-point/{id}',  [ControllersUsersController::class,'userPoint'])->name('admin-users-point');
//orders
Route::resource('/admin-orders', OrderController::class);
//points
Route::resource('/admin-points', PointsController::class);
//admin-item-category
Route::resource('/admin-item-category', CategoryItemsController::class);
//admin-item
Route::resource('/admin-items', ItemsController::class);

//partners
Route::resource('/admin-partners', ControllersPartnersController::class);
//
Route::resource('/admin-how-use', HowToUseController::class);
//admin-feedback
Route::resource('/admin-feedback', FeedbackController::class);

//admin-counter
Route::resource('/admin-counter', CounterController::class);
   //blogs
   Route::resource('/admin-blogs', BlogsController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
