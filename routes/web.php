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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/questions', 'QuestionsController');
Route::resource('/replies', 'RepliesController');

Route::get('/addVote/{question}', 'QuestionsController@addVote')-> name('questions.addVote');
Route::get('/questions/category/{category}', 'QuestionsController@category')-> name('questions.category');
Route::get('/removeVote/{question}', 'QuestionsController@removeVote')-> name('questions.removeVote');
Route::get('/markAsBest/{reply}', 'RepliesController@markAsBest')-> name('replies.markAsBest');
Route::get('/removeAsBest/{reply}', 'RepliesController@removeAsBest')-> name('replies.removeAsBest');

Route::get('/questions/{id}/edit', 'QuestionsController@edit');




Route::get('/questions/{id}/', 'QuestionsController@update');





