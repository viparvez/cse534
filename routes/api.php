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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('/webhook','WebhookController@setWebhook');
route::post('/webhook','WebhookController@handle');

// Route::match(['get', 'post'], '/webhook', 'WebhookController@handle');


Route::post('/bot/form/generic', 'FormController@generic_template')->name('form.generic_template');
Route::post('/bot/form/element/button', 'FormController@btnElem')->name('form.btnElem');
Route::post('/bot/form/button', 'FormController@button_template')->name('form.button_template');