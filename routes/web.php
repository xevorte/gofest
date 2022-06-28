<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'TravelController@index')->name('home');
Route::get('/search/destination', 'TravelController@search')->name('search');
Route::get('/search/transportation', 'TravelController@search_transportation')->name('search-transportation');
Route::get('/destinations', 'TravelController@destinations')->name('destinations');
Route::get('/transportations', 'TravelController@transportations')->name('transportations');
Route::get('/destinations/{country}/{type}/{travelpackage:slug}', 'TravelController@show')->name('show');
Route::get('/transportations/{type}/{transportation:slug}', 'TravelController@transportation');

Route::prefix('profile')
    ->middleware(['auth'])
    ->group(function () {
        Route::post('/edit', 'TravelController@edit')->name('profile.edit');
        Route::post('/update', 'TravelController@update')->name('profile.update');
    });

Route::middleware(['auth'])->group(function () {
    Route::get('/retrieve', 'RetrieveController@all')->name('retrieve.all');
    Route::get('/retrieve/cancel/destination/{id}', 'RetrieveController@cancel_destination')->name('retrieve.cancel-destination');
    Route::get('/retrieve/cancel/transportation/{id}', 'RetrieveController@cancel_transportation')->name('retrieve.cancel-transportation');
    Route::post('/retrieve/voucher/destination', 'RetrieveController@voucher_destination')->name('retrieve.voucher-destination');
    Route::post('/retrieve/voucher/transportation', 'RetrieveController@voucher_transportation')->name('retrieve.voucher-transportation');
    Route::get('/retrieve/payment', 'RetrieveController@payment')->name('retrieve.payment');
    Route::post('/retrieve/payment/lodging', 'RetrieveController@payment_lodging')->name('retrieve.payment-lodging');
    Route::post('/retrieve/payment/transportation', 'RetrieveController@payment_transportation')->name('retrieve.payment-transportation');
});

Route::prefix('booking')
    ->middleware(['auth'])
    ->group(function () {
        Route::post('/fill-in-data/{travelpackage:slug}', 'BookingController@filldata')->name('fill-in-data');
        Route::post('/review/{travelpackage:slug}', 'BookingController@review')->name('review');
        Route::post('/pay-later', 'BookingController@pay_later')->name('pay-later');
        Route::post('/payment/{travelpackage:slug}', 'BookingController@payment')->name('payment');
        Route::post('/payment-process/{travelpackage:slug}', 'BookingController@payment_process')->name('payment-process');
        Route::post('/checkout', 'BookingController@checkout')->name('checkout-destination');
        Route::get('/checkout/success', function () {
            return view('pages.progress');
        })->name('checkout-progress');

        Route::post('/fill-in-data-transportation/{transportation:slug}', 'BookingController@filldatatransportation')->name('fill-in-data-transportation');
        Route::post('/pay-later-transportation', 'BookingController@pay_later_transportation')->name('pay-later-transportation');
        Route::post('/payment-transportation/{transportation:slug}', 'BookingController@paymenttransportation')->name('payment-transportation');
        Route::post('/payment-process-transportation/{transportation:slug}', 'BookingController@payment_process_transportation')->name('payment-process-transportation');
        Route::post('/checkout-transportation', 'BookingController@checkout_transportation')->name('checkout-transportation');
    });

Route::prefix('dashboard')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard-home');

        Route::resource('destinations', 'DestinationsController');
        Route::resource('transportation', 'TransportationController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction-destinations', 'TransactionController');
        Route::post('transaction-destinations/{transaction}', 'TransactionController@cancel')->name('transaction-destinations.cancel');
        Route::resource('transaction-transportations', 'TransactionTransportationController');
        Route::post('transaction-transportations/{transactiontransportation}', 'TransactionTransportationController@cancel')->name('transaction-transportations.cancel');
        Route::resource('reviews', 'ReviewsController');
    });

Auth::routes(['verify' => true]);
