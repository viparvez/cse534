<?php

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bot/form/text', 'FormController@text')->name('form.text');

Route::get('/bot/form/media', 'FormController@media_template')->name('form.media_template');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');

Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/test/{id}', 'MediatemplateController@create');

Route::group(['middleware' => ['auth']], function () {

    Route::resources([
	    'bot' => 'BotController',
	    'gallery' => 'GalleryController'
	]);

	Route::get('/bot/{id}/template/generic','BotController@getGeneric')->name('bot.getGeneric');
	Route::get('/bot/{id}/template/button','BotController@getButton')->name('bot.getButton');
	Route::get('/bot/{id}/template/media','BotController@getMedia')->name('bot.getMedia');
	Route::get('/bot/{id}/template/text','BotController@getText')->name('bot.getText');
	Route::get('/bot/{id}/listener','BotController@listener')->name('bot.listener');
	Route::get('/bot/{id}/configure','BotController@configure')->name('bot.configure');
	Route::post('/bot/create','BotController@createBot')->name('bot.createBot');

	Route::get('/pages','HomeController@pages')->name('pages');
	Route::get('/instructions','HomeController@instructions')->name('instructions');

	Route::post('/bot/{id}/template/text','TxtController@insert')->name('bot.postText');
	Route::post('/bot/{id}/template/button','ButtonController@insert')->name('bot.postBtn');
	Route::post('/bot/{id}/template/media','MediatemplateController@insert')->name('bot.postMedia');
	Route::post('/bot/{id}/listener','TxtController@createlistener')->name('bot.createlistener');


});
