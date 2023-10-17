<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicInvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGSTbillController;
use App\Http\Controllers\UserTypeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

route::controller(UserController::class)->group(function () {
    Route::post('/add-new-client', 'AddUserDetail')->name('AddClientPage');
    Route::post('/CreateBill', 'ShowExistingClient')->name('ShowClient');
    Route::get('/ManageParties', 'ShowUserDetail')->name('ManageParties');
    Route::get('/Delete/{id}', 'DeleteUser')->name('DeleteUser');
    Route::get('/UpdatePage/{id}', 'UpdateDetailPage')->name('UpdateClient');
    Route::post('/UpdatePage/{id}', 'DetailUpdate')->name('AfterUpdate');
    // Route::get('/change-password', 'showChangeForm')->name('password.change.form');
    Route::post('/change-password', 'changePassword')->name('password.change');
});


route::controller(UserTypeController::class)->group(function () {
    Route::get('/add-new-client', 'clientType');
});

//  PUBLIC INVOICE(ROUTE)

route::controller(PublicInvoiceController::class)->group(function () {

    Route::get('Create-Invoice/{phone_number}', 'CreateInvoice')->name('CreateInvoice');
    route::get('Invoice/{id?}', 'GetInvocieData')->name('invoiceList');
    route::post('Invoice/{id}', 'InvoiceBillPage')->name('InvoiceNumber');
    Route::post('Create-Invoice', 'PublicInvoiceDetail')->name('CreateInvoiceDesc');
    Route::get('InvoiceList', 'InvocieLists');
});


route::controller(UserGSTbillController::class)->group(function () {
    Route::post('/myAccount', 'CompanyDetailUpdate');
    Route::get('/CreateBill', 'ExistingClient');
    Route::get('gst-bill/{invoice_number?}', 'InvoiceGSTBillPage')->name('lastfivegstrec');
    Route::post('Create-bill', 'GSTUserInfoInsert')->name('insertGSTbill');
    Route::get('/ManageGST', 'GetBills');
    Route::get('/ManageGST/{id}', 'deleteGstbill')->name('delete.bill');
});


Route::get('/', function () {
    return view('auth.login');
});
Route::get('register', function () {
    return view('auth.register');
});
Route::get('changepw', function () {
    return view('auth.changepw');
});

route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'getLastFiveVendorRecords')->name('dashboard');
    route::get('Invoice/{id}', 'GetInvocieData')->name('lastfiverec');
    Route::get('gst-bill/{invoice_number?}', 'InvoiceGSTBillPage')->name('lastfivegstrec');
    Route::get('myAccount', 'myAccount');
    // Route::get('gst-bill', 'myCompany');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
