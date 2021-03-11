<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/our-commitment', 'LeadController@ourCommitment');
Route::post('/geniune-parts', 'LeadController@geniuneParts');
Route::post('/book-service', 'LeadController@bookService');
Route::post('/accessories-quote', 'LeadController@accessoriesQuote');
Route::post('/newsletter', 'LeadController@newsletter');
Route::post('/finance-quote', 'LeadController@financeQuote');
Route::post('/get-brochure', 'LeadController@getBrochure');
Route::post('/get-specsheet', 'LeadController@getSpecSheet');
Route::post('/get-accessories-brochure', 'LeadController@getAccessoriesBrochure');
Route::post('/test-drive', 'LeadController@testDrive');
Route::post('/contact-us', 'LeadController@contactUs');
