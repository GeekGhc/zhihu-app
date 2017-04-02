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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/test', 'AnswersController@test')->middleware("auth:api");

Route::get('/topics','TopicsController@index')->middleware('api');//问题话题api


Route::post('/question/isFollow','QuestionFollowController@isFollow')->middleware('auth:api');//用户是否关注了一个问题
Route::post('/question/follow','QuestionFollowController@followThisQuestion')->middleware('auth:api');//用户关注一个问题


Route::get('user/followers/{id}','FollowersController@index');
Route::post('user/follow','FollowersController@follow');

Route::post('/answer/{id}/votes/users','VotesController@users');
Route::post('/answer/vote','VotesController@vote');

Route::post('/message/store','MessagesController@store');

Route::get('/answer/{id}/comments','CommentsController@answer');
Route::get('/question/{id}/comments','CommentsController@question');

Route::post('/comment','CommentsController@store');