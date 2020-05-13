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
    return view('/login');
});
Route::get('password/lost', 'ForgotPasswordController@forgotPassword');

Auth::routes();
Route::get('dashboard', 'DashboardController@index');
Route::get('changepassword', 'UserController@changepassword');
Route::post('updatepassword', 'UserController@updatePassword');
Route::get('profile', 'UserController@profile');
Route::resource('pages', 'PagesController');
Route::resource('moto', 'MotoController');
Route::resource('customer', 'CustomerController');
Route::resource('income', 'IncomeController');
Route::resource('debt', 'DebtController');
Route::resource('debt_temp', 'DebttempController');

Route::post('update/{user_id}', 'UserController@updateprofile');
Route::post('changePassword/{user_id}', 'UserController@updatePassword')->name('changePassword');
Route::get('user/profile', 'UserController@profile');
Route::get('main/logout', 'MainController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// DEBTS
Route::get('debt/create', 'DebtController@create');
Route::get('consultar', 'DebtController@listIncomes')->name('consultar'); 
Route::post('agregar_registro', 'DebtController@addDebtTemp')->name('agregar_registro'); //Agregar registro de debt temp
Route::delete('eliminar_registro/{id}', 'DebttempController@destroy')->name('eliminar_registro'); //Agregar registro de debt temp
Route::get('agregar_todos', 'DebtController@addAll')->name('agregar_todos'); //Agregar todos los registros.
