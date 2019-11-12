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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/','DashboardController@index');


// DASHBOARD
Route::get('/search','DashboardController@searchAll');
Route::get('/searchAdvanced','DashboardController@searchBy');
Route::get('/searchLokasi/{lokasis}','LokasiController@searchByLokasi');

// KOLEKSI
Route::resource('koleksi','KoleksiController');
Route::get('/searchKoleksi/{koleksis}','KoleksiController@searchByKoleksi');

Route::resource('katalog','KatalogController');
Route::resource('lokasi','LokasiController');

Auth::routes();

Route::group(['middleware' => ['auth']], function ()
{
	Route::get('/home','HomeController@admin');
	Route::get('/log','HomeController@log');
	Route::get('/logout','Auth\LoginController@logout');

	Route::post('/uploadExcel','HomeController@upload');
	Route::post('/uploadKoleksi','HomeController@uploadKoleksi');

	// Route::get('/insert',function(Request $request){
	// 	$judul = $request->judul;

	// 	$katalog = DB::select('call insertKatalog(?)',[$judul]);
	// });
});