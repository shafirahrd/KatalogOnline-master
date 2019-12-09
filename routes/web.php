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

Route::get('/katalog/action','KatalogController@action')->name('katalog.action');
Route::resource('katalog','KatalogController');
Route::resource('lokasi','LokasiController');

Auth::routes();

Route::group(['middleware' => ['auth']], function ()
{
	Route::get('/home','AdminController@excel');
	Route::get('/excel','AdminController@excel');
	Route::get('/csv','AdminController@csv');
	Route::get('/log','AdminController@log');
	Route::get('/logout','Auth\LoginController@logout');

	Route::post('/uploadExcel','AdminController@parseExcel');
	Route::post('/uploadCSV','AdminController@parseCSV');
	Route::post('/uploadKoleksi','AdminController@uploadKoleksi');

	Route::post('/importFile','AdminController@import')->name('import');
});