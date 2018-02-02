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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/blog/{post}','PostController@show')->name('posts.show');
Route::get('/categorias/{category}','CategoriesController@show')->name('category.show');
Route::get('/tags/{tag}','TagsController@show')->name('tag.show');


//Rutas de administración
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    
    Route::name('index.posts')->get('/posts','PostController@index');
    Route::name('admin.index')->get('/', 'AdminController@index');
    Route::name('admin.post.create')->get('/posts/create','PostController@create');
    Route::name('admin.post.store')->post('/posts/store','PostController@store');

    Route::name('admin.post.edit')->get('/post/edit/{post}','PostController@edit');
    Route::name('admin.post.update')->put('/post/update/{post}','PostController@update');
    Route::name('admin.post.photos.store')->post('/posts/{post}/photos','PhotosController@store');
    Route::name('admin.photos.destroy')->delete('/photos/{photo}/destroy','PhotosController@destroy');
    
});



        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        //Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');