<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\DashBordController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaidController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\TwitController;

use App\Http\Controllers\DealerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfitAdminController;
use App\Http\Controllers\TruchController;
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
    // dd(User::find(1)->orders);
    return view('cms.parent');
});

Route::resource('twit',TwitController::class);


Route::prefix('cms/')->group(function () {
Route::post('user/serach',[SearchController::class,'SearchUser'])->name('user.search');
Route::post('user/serach/bill',[SearchController::class,'BillUsers'])->name('bill.user.search');
Route::post('dealer/search/',[SearchController::class,'dealsearch']);
Route::get('/print',[PrintController::class,'index'])->name('print');
Route::get('/deal/products/{id}/',[DealerController::class,'dealProducts'])->name('deal.proud');
Route::get('admin/dashbord',[DashBordController::class,'admin'])->name('admin.dashbord');
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

Route::post('/profit/admin/',[ProfitAdminController::class,'adminProfit'])->name('admin.profit');
});
Route::get('hh/',[OrderController::class,'hh'])->name('dd.build');

