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

Route::get('bv/', 'BaivietController@index');

Route::get('/', 'BaivietController@index')->name('/');

Route::get('/tin/{id}', 'BaivietController@detail');

Route::get('loai/{TenKD}', 'BaivietController@cat');

Route::get('lienhe/', 'BaivietController@lienhe');

Route::post('lienhe/', 'GuimailController@guimaillienhe');

Route::post('comment/{idTin}','CommentController@comment');

Route::get('doingonngu/{language}', 'BaivietController@changeLanguage')->name('change-lang');

Route::get('timkiem/','BaivietController@timkiem');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth','quantri']], function () {
    Route::get('quantri','TinController@index');
    Route::resource('theloai', 'TheloaiController');
    Route::resource('loaitin', 'LoaitinController');
    Route::resource('tintuc', 'TinController');
    Route::get('layloaitintrong1theloai/{idTL}', function($idTL){	
		$kq = DB::select("SELECT idLT, Ten FROM loaitin WHERE idTL=$idTL");
		foreach($kq as $row) { echo "<option value=$row->idLT> $row->Ten </option>";}
	});

 });