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
Route::get('/', 'BlogController@index');

Auth::routes();

Route::get('/blog', 'BlogController@index')->name('blog.home');
Route::get('/blog/create','BlogController@create')->name('blog.create')->middleware('author');
Route::post('/blog/store','BlogController@store')->name('blog.store');
//keep trashed route here

Route::get('/blog/trash','BlogController@trash')->name('blog.trash');
Route::get('/blog/trash/{id}/restore','BlogController@restore')->name('blog.restore');
Route::delete('/blog/trash/{id}/pernamentDelete','BlogController@pernamentDelete')->name('blog.pernamentDelete');



Route::get('/blog/{id}','BlogController@show')->name('blog.show');
Route::get('/blog/{id}/edit','BlogController@edit')->name('blog.edit');
Route::patch('/blog/{id}/update','BlogController@update')->name('blog.update');
Route::delete('/blog/{id}/delete','BlogController@delete')->name('blog.delete');

//admin routes
Route::get('/dashboard','AdminController@index')->name('dashboard');
Route::get('/admin/blogs','AdminController@blogs')->name('admin.blogs');


//route Category
Route::resource('category','CategoryController');

//route User
Route::resource('users','usercontroller');



