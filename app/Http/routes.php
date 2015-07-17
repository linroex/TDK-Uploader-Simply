<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ViewController@showIndex');

Route::get('/login', 'ViewController@showLoginPage');
Route::post('/login', 'UserController@login');

Route::get('/logout', 'UserController@logout');

Route::group(['prefix' => '/admin', 'middleware' => 'checkAdmin'], function() {
    Route::group(['prefix' => '/issue'], function() {
        Route::get('/add', 'ViewController@showIssueAddAdminPage');
        Route::get('/list', 'ViewController@showIssueListAdminPage');
        Route::get('/{id}', 'ViewController@showIssueDetailAdminPage');

        Route::post('/add', 'IssueController@addIssue');
    });

    Route::group(['prefix' => '/user'], function() {
        Route::get('/batch', 'ViewController@showBatchAddUserPage');
        Route::post('/batch', 'UserController@batchAddUser');
    });
    
});

Route::group(['middleware' => 'checkUser'], function() {
    Route::get('/file/{file_id}', 'IssueController@download');
    Route::get('/profile', 'ViewController@showProfilePage');

    Route::group(['prefix' => 'issue'], function() {
        Route::get('/list', 'ViewController@showIssueListUserPage');
        Route::get('/{id}', 'ViewController@showIssueUploadUserPage');

        Route::get('/{issue_id}/{file}/delete', 'IssueController@delete');
        Route::post('/{id}/upload', 'IssueController@upload');


    });    
});

