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

Route::get('login', ['as' =>'login.show', 'uses' => 'HomeController@showLogin']);

Route::post('login', ['as' =>'login.do', 'uses' => 'HomeController@doLogin']);

Route::get('logout', ['as' =>'logout.do', 'uses' => 'HomeController@doLogout']);

Route::get('contacts', ['as' => 'contacts.list', 'uses' => 'ContactController@list'])->middleware('auth.basic');

Route::get('contacts/create', ['as' => 'contacts.form.create', 'uses' => 'ContactController@formCreate'])->middleware('auth.basic');

Route::post('contacts/create', ['as' => 'contacts.form.insert', 'uses' => 'ContactController@create'])->middleware('auth.basic');

Route::get('contacts/{contact}/update', ['as' => 'contacts.form.insert', 'uses' => 'ContactController@formUpdate'])->middleware('auth.basic');

Route::post('contacts/{contact}/update', ['as' => 'contacts.form.update', 'uses' => 'ContactController@update'])->middleware('auth.basic');
