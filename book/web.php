<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\BookController;

use App\Http\Controllers\FilesController;
use App\Http\Controllers\FileUploadController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('product', ProductController::class);
Route::get('product', 'App\Http\Controllers\ProductController@index')->name('product.index');

Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/product/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/product/store', 'App\Http\Controllers\ProductController@store')->name('product.store');
//Route::get('product', 'App\Http\Controllers\PostController@index')->name('posts');
Route::get('product/show/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::get('search', 'App\Http\Controllers\ProductController@search')->name('search');

/*
Route::get('search', 'App\Http\Controllers\SearchController@index')->name('search.index');
Route::get('filter', 'App\Http\Controllers\SearchController@index')->name('search.search');

*/








Route::resource('books', BookController::class);
Route::get('/book/create', 'App\Http\Controllers\BookController@create')->name('book.create');
Route::post('/book/store', 'App\Http\Controllers\BookController@store')->name('book.store');

Route::get('book/show/{id}', 'App\Http\Controllers\BookController@show')->name('book.show');

//Route::get('/book/edit', 'App\Http\Controllers\BookController@edit')->name('books.edit');

//Route::post('/book/edit', 'App\Http\Controllers\BookController@update')->name('books.edit');

Route::post('/book/update', 'App\Http\Controllers\BookController@update')->name('books.update');
//Route::get('product', 'App\Http\Controllers\PostController@index')->name('posts');



Route::get('showbooks', 'App\Http\Controllers\BookController@showbook')->name('showbooks');



Route::get('files', 'App\Http\Controllers\FilesController@index')->name('notice.index');
Route::get('files/add', 'App\Http\Controllers\FilesController@create')->name('notice.create');
Route::post('files/add', 'App\Http\Controllers\FilesController@store')->name('notice.store');

 
Route::get('file-upload', [FileUploadController::class, 'fileUpload'])->name('file.upload');
Route::post('file-upload', [FileUploadController::class, 'fileUploadPost'])->name('file.upload.post');
