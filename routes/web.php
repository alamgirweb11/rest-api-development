<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'],function(){
    // vue component
    Route::get('/test-component', 'StudentController@test_component');
    Route::get('/common-form', 'StudentController@common_form');
    // role permission
   Route::resource('users', 'UserController'); 
   Route::resource('roles', 'RoleController'); 
   Route::resource('permissions', 'PermissionController'); 
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('dashboard');

//cache clear script
Route::get('cache-clear', function () {

    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');

    dd("Cache is cleared");

});