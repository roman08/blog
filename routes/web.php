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
	//metodo ordena las fechas de la ultima a la primera
	$posts = App\Post::latest('published_at')->get();
    return view('welcome')->with(compact('posts'));
});


Route::get('posts',function(){
	return App\Post::all();
});