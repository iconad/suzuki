<?php

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

Route::get('/', 'pageController@home')->name('home');
Route::get('/vehicle', 'pageController@singeVehicle');

// Forms
Route::get('/get-a-quote', 'pageController@getQuote')->name('form.getquote');
Route::get('/get-a-broucher', 'pageController@getBroucher')->name('form.getbroucher');
Route::get('/test-drive', 'pageController@testDrive')->name('form.testdrive');
Route::get('/request-accessories-quote', 'pageController@RequestQuoteAccessories')->name('form.requestquoteaccessories');
Route::get('/book-a-service', 'pageController@bookService')->name('form.bookservice');
Route::get('/our-commitment', 'pageController@ourCommitment')->name('form.ourcommitment');
Route::get('/contact-us', 'pageController@contactUs')->name('contact-us');

Route::get('/locations/{location}/{type}/', 'pageController@showroomLocation');
Route::get('/locations/{location}/services/', 'pageController@servicesLocation');
Route::get('/locations/{location}/parts/', 'pageController@partsLocation');

Auth::routes();


Route::group(['prefix' => 'manage'], function() {

    Route::group(['middleware' => ['auth','permission:browse admin']], function () {
        Route::get('/dashboard', 'ManagePages@dashboard')->name('manage.dashboard');
        Route::resource('/branches', 'BranchController');
        Route::resource('/branches/{branch}/offices', 'BranchOfficeController');
    });

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
