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

// redirects
Route::get('/Pages/RequestQuote.aspx', function () {
    return redirect()->route('contact-us');
});

Route::get('/', 'PageController@home')->name('home');
Route::get('/home', 'PageController@home');
Route::get('/vehicles', 'PageController@vehicles');
Route::get('/vehicles/{vehicle}', 'PageController@singeVehicle');
Route::get('/page/{page}', 'PageController@show');
Route::get('/page', 'PageController@vehiclesPage');

// Forms
Route::get('/get-a-quote', 'formPagesController@getQuote')->name('form.getquote');
Route::get('/get-a-brochure', 'formPagesController@getBroucher')->name('form.getbroucher');
Route::get('/get-a-specsheet', 'formPagesController@getSpecsheet')->name('form.getSpecsheet');
Route::get('/test-drive', 'formPagesController@testDrive')->name('form.testdrive');
Route::get('/book-a-service', 'formPagesController@bookService')->name('form.bookservice');
Route::get('/request-accessories-quote', 'formPagesController@RequestQuoteAccessories')->name('form.requestquoteaccessories');
// Route::get('/our-commitment', 'formPagesController@ourCommitment')->name('form.ourcommitment');
Route::get('/pre-owned-cars', 'pagesController@preOwnedCars')->name('pre-owend-cars');
Route::get('/business-solutions', 'pagesController@BusinessSolutions')->name('business-solutions');
Route::get('/contact-us', 'formPagesController@contactUs')->name('contact-us');

Route::group(['prefix' => 'after-sales'], function() {
    Route::get('/services', 'afterSalesController@services')->name('aftersales.services');;
    Route::get('/warranty', 'afterSalesController@warranty')->name('aftersales.warranty');;
    Route::get('/service-payment-plan', 'afterSalesController@servicePaymentPlan')->name('aftersales.servicepaymentplan');;
    Route::get('/book-service', 'afterSalesController@bookService')->name('aftersales.bookservice');;
    Route::get('/genuine-parts', 'afterSalesController@genuineParts')->name('aftersales.genuineparts');;
    Route::get('/accessories/{vehicle}', 'afterSalesController@vehicleAccessories')->name('aftersales.vehicleaccessories');;
    Route::get('/recall-announcements', 'afterSalesController@RecallAnnouncements')->name('aftersales.recallannouncements');
    Route::get('/our-commitment', 'afterSalesController@OurCommitment')->name('aftersales.outcommitment');
    Route::get('/recall-announcements/{announcement}', 'afterSalesController@RecallAnnouncement')->name('aftersales.recallannouncement');
});

Route::get('/locations/{location}/{type}/', 'PageController@showroomLocation');
Route::get('/locations/{location}/services/', 'PageController@servicesLocation');
Route::get('/locations/{location}/parts/', 'PageController@partsLocation');

Auth::routes();
Route::get('/logout', 'HomeController@logout')->name('logout');

Route::group(['prefix' => 'cms'], function() {

    Route::group(['middleware' => ['auth','role:admin']], function () {
        Route::get('/dashboard', 'ManagePages@dashboard')->name('manage.dashboard');
        Route::post('/media/store', 'ManageMediaController@store');
        Route::get('/media', 'ManageMediaController@getAllMedia')->name('media.getallmedia');
        Route::get('/menus', 'ManagePages@menus')->name('manage.menus');
        Route::get('/leads/{lead}', 'ManagePages@singleLead');
        Route::get('/leads/type/{newsletter}', 'ManagePages@index')->name('manage.leads.index');
        Route::resource('/vehicles', 'VehicleController');
        Route::resource('/vehicles/{vehicle}/files', 'VehicleFileController');
        Route::resource('/vehicles/{vehicle}/accessories', 'AccessoryController');
        Route::resource('/accessory-categories', 'AccessoryCategoryController');
        Route::resource('/branches', 'BranchController');
        Route::resource('/recall-announcements', 'RecallController');
        Route::resource('/pages', 'PageManagerController');
        Route::resource('/branches/{branch}/offices', 'BranchOfficeController');
    });

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
