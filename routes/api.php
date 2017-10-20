<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('test', function() {
	return 'Test';
});

Route::get('index', 'AccessController@index');

Route::post('/authenticatedns', 'AccessController@AuthenticateDns');

//DESKTOP
/*Route::group(['prefix' => '/agrotools/mobile'], function (){

	//ACCESSDATA
	Route::get('/getdns/{dns}{company}', 'AccessController@getDns');
	
});*/
