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

Route::get('/','QuestionsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');


//邮件的验证
Route::get('/email/verify/{token}',['as'=>'email.verify','uses'=>'EmailController@verify']);

//问题的创建和显示视图
Route::resource('questions','QuestionsController',['names'=>[
    'create'=>'questions.create',
    'show'=>'questions.show'
]]);


Route::post('questions/{questionId}/answer','AnswersController@store');//创建问题的答案

Route::get('/questions/{questionId}/follow','QuestionFollowController@follow');//用户关注某个问题


Route::get('messages','NotificationsController@index');//用户的站内信通知

Route::get('inbox','InboxController@index');
Route::get('inbox/{dialogId}','InboxController@show');//私信消息详情
Route::post('inbox/{dialogId}/store','InboxController@store');//私信回复
