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

Route::get('/login', 'ViewController@showLoginPage');

Route::group(['prefix' => '/admin'], function() {
    Route::group(['prefix' => '/issue'], function() {
        Route::get('/add', 'ViewController@showIssueAddAdminPage');
        Route::get('/list', 'ViewController@showIssueListAdminPage');
        Route::get('/{id}', 'ViewController@showIssueDetailAdminPage');
    });
});

Route::group(['prefix' => 'issue'], function() {
    Route::get('/list', 'ViewController@showIssueListUserPage');
    Route::get('/{id}', 'ViewController@showIssueUploadUserPage');
});