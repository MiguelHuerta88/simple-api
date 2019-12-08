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
Route::get('login', 'Api\AuthController@login')->name('login');
Route::post('login', 'Api\AuthController@postLogin')->name('post.login');

Route::middleware(['auth:api'])->group(function(){
	Route::get('logout', 'Api\AuthController@logout')->name('logout');

	Route::get('notes', 'Api\NotesController@notes');
	Route::post('note', 'Api\NotesController@create');
	Route::post('note/{notes}', 'Api\NotesController@update')->middleware('isOwner')->name('api.update.note');
});