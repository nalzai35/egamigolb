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

Route::get('paginate', function() {
    return App\User::paginate(10);
});

Route::get('/', function() {
    return view('welcome');
})->name('homepage');

// Untuk schedule poster
Route::get('/poster', 'Poster@post');

Route::group(['prefix' => 'topic'], function() {
    Route::get('/', 'CategoryController@index');
});


Auth::routes();

Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::get('/keyword', 'DashboardController@keyword')->name('keyword');
    Route::post('/keyword', 'DashboardController@insert')->name('keyword.insert');

    // Admin posts
    Route::get('/posts', 'DashboardController@post')->name('post.index');

    // Admin categories
    Route::get('/categories', 'DashboardController@category')->name('category.index');

    // Admin users
    Route::get('/users', 'DashboardController@users')->name('user.index');
    // Route::delete('/users/{id}', 'DashboardController@userDelete')->name('user.delete');

    // Admin campign
    Route::get('/campigns', 'DashboardController@campign')->name('campign.index');

    // Admin campign
    Route::get('/templates', 'DashboardController@template')->name('template.index');
});

Route::group(['prefix' => 'back'], function() {
    Route::get('users', 'back\UserController@index');
    Route::get('users/{id}', 'back\UserController@show');
    Route::delete('users/{id}', 'back\UserController@destroy');
});
