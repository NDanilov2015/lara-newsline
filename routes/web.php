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

/**
 * Админская часть
 */
//Административное меню
Route::group(['middleware' => 'auth'], function () {
	
	Route::group(['prefix' => 'manager'], function () {
	
	Route::get('/', 'Admin\ManagerController@index'); //Индексная страница админки
	Route::get('/logout', 'Auth\LoginController@destroy'); //Разлогинивание
	
	//Это контроллеры из пространства имён Admin уже, не клиентской части
	Route::get('categories', 'Admin\ManagerCategoriesController@index');
	Route::get('categories/create', 'Admin\ManagerCategoriesController@create');
	Route::post('categories/create', 'Admin\ManagerCategoriesController@store');
	Route::get('categories/{id}/edit', 'Admin\ManagerCategoriesController@edit');
	Route::post('categories/{id}/edit', 'Admin\ManagerCategoriesController@update');
	Route::get('categories/{id}/delete', 'Admin\ManagerCategoriesController@destroy');
	

	Route::get('posts', 'Admin\ManagerPostsController@index');
	Route::get('posts/create', 'Admin\ManagerPostsController@create');
	Route::post('posts/create', 'Admin\ManagerPostsController@store');
	// --- здесь. Почти всё сделано уже ведь --
	Route::get('posts/{id}/edit', 'Admin\ManagerPostsController@edit');
	Route::post('posts/{id}/edit','Admin\ManagerPostsController@update');
	Route::get('posts/{id}/delete', 'Admin\ManagerPostsController@destroy');
	
	});

});

/**
 * Клиентская часть
 */

Route::group(['middleware' => 'guest'], function () {
	Route::get('/', 'PostsController@index');

	Route::get('/auth/login', 'Auth\LoginController@create')->name('login');
	Route::post('/auth/login', 'Auth\LoginController@store');

	Route::get('/{category_slug?}', 'PostsController@catIndex'); 
	Route::get('/{category_slug}/{post_slug}', 'PostsController@show');
});