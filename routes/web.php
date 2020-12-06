<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DashBordController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaidController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\TwitController;

use App\Http\Controllers\DealerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfitAdminController;
use App\Http\Controllers\TruchController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\UserAccessController;
use App\Models\Paid;
use App\Models\User;
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

Route::get('/', function () {
    return view('user.parent');
    // dd(User::find(1)->orders);
    // return redirect()->route('user.index');
});

Route::resource('twit',TwitController::class);
// Route::resource('admin', AdminController::class);
//////////////////////////////////////
///////////////Admin////////////////
// Route::resource('admin', AdminController::class);

Route::prefix('cms/')->middleware('auth:admin')->group(function () {
Route::resource('admin', AdminController::class);


Route::post('user/serach',[SearchController::class,'SearchUser'])->name('user.search');
Route::post('user/serach/bill',[SearchController::class,'BillUsers'])->name('bill.user.search');
Route::post('dealer/search/',[SearchController::class,'dealsearch']);
Route::get('/print',[PrintController::class,'index'])->name('print');
Route::get('/deal/products/{id}/',[DealerController::class,'dealProducts'])->name('deal.proud');
Route::get('dashbord',[DashBordController::class,'admin'])->name('admin.dashbord');
Route::resource('user', UserController::class);
Route::resource('paid', PaidController::class);
Route::resource('deal', DealerController::class);
Route::resource('proud', ProductController::class);
Route::post('deal/prod/store',[ProductController::class,'DealProud'])->name('prod.deal.store');
Route::get('getDeal/proud/fun/{id}',[DealerController::class,'getDeal'])->name('getdeal');

Route::resource('bill', BillController::class);
Route::resource('order', OrderController::class);
Route::get('order/build/{token}',[OrderController::class,'build'])->name('order.build');
Route::post('order/create2',[OrderController::class,'ordercreate2'])->name('order.post.create2');
Route::get('create2/{id}',[OrderController::class,'create2'])->name('order.get.create2');
Route::post('serach/bill',[SearchController::class,'Bills'])->name('bill.search');
Route::get('report/index/all',[PrintController::class,'indexbill'])->name('report.bill.index');
Route::post('/report/data/bill',[PrintController::class,'databill'])->name('data.bill');
Route::post('/report/data/bill/user',[PrintController::class,'databilluser'])->name('data.user.bill');

Route::post('view/bills',[PrintController::class,'billindex'] )->name('view.bill.index');
Route::post('view/user/bills',[PrintController::class,'UserBillIndex'] )->name('user.bill.index');
Route::post('/paid/users/get',[PaidController::class,'PrintUsersPaid'])->name('paid.users');
Route::post('/paid/user/paid',[PaidController::class,'userPaid'])->name('paid.user');

Route::get('paid/get/paid/{id}',[PaidController::class,'getpaid'])->name('paid.get.paid');
Route::post('/print/paids/users',[PaidController::class,'reprotspaidusers'])->name('print.paidusers');



Route::get('/trush',[TruchController::class,'index'])->name('truch.index');
Route::delete('/truch/restore/{id}',[TruchController::class,'restore'])->name('truch.restore');
Route::delete('/truch/restore/user/{id}',[TruchController::class,'userRestore'])->name('user.restore');
Route::delete('/truch/restore/event/{id}',[TruchController::class,'eventRestore'])->name('event.restore');


Route::post('/profit/admin/',[ProfitAdminController::class,'adminProfit'])->name('admin.profit');

////////////////////////////////
Route::post('/event/store',[EventController::class,'store'])->name('event.store');
Route::get('/event',[EventController::class,'index'])->name('event.index');
Route::put('/event/update/{id}',[EventController::class,'update'])->name('event.update');
Route::get('/event/{id}/edit',[EventController::class,'edit'])->name('event.edit');

Route::delete('/event/delete/{id}',[EventController::class,'delete'])->name('event.delete');

Route::resource('contact',ContactController::class);
    Route::get('logout', [AdminAuthController::class,'logout'])->name('admin.logout');


});


/////////////////////////LOGIN ADMIN//////////////
Route::prefix('cms/admin/')->namespace('Auth')->group(function () {

    Route::get('page/login', [AdminAuthController::class,'showLoginView'])->name('admin.login.view');
    Route::post('login',  [AdminAuthController::class,'login'])->name('admin.login.store');
    Route::get('blocked', [AdminAuthController::class,'blocked'])->name('admin.blocked');

    // Route::get('forgot-password', 'AdminAuthController@showForgetPassword')->name('cms.admin.forgot_password_view');
    // Route::post('forgot-password', 'AdminAuthController@requestNewPassword')->name('cms.admin.forgot_password');
});
    Route::get('blo', [AdminAuthController::class,'blocked'])->name('admin.blocked');


    //////////////////////////////////////
///////////////Admin//////////////////////////
//////////////////////////////////////////////
///////////////  U S E  R /////////////////////////
///////////////////////////////////////////
///////////////Admin////////////////////


Route::prefix('auth/')->group(function () {
Route::post('/user/bills',[PrintController::class,'Authuserbill'])->name('auth.bills');
Route::get('/',[DashBordController::class,'user'])->name('user.dashbord');
Route::get('/Product',[UserAccessController::class,'twit'])->name('user.twit');
Route::get('/contact',[UserAccessController::class,'contact'])->name('user.contact');

});



