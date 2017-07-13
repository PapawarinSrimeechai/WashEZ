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

Route::get('/', function  () {
    return view('welcome');
});

Route::get('your-apartment', function () {
    return view('easy.your_apartment');
});

Route::get('Maps', function () {
    return view('googlemap.map');
});

Route::get('add-apartment', function () {
    return view('easy.add_apartment');
});

Route::resource('easyDorm','easy\dormController');
Route::resource('easyDetail','easy\detailController');

Route::get('statisUse/{id}','easy\detailController@statisUse');
Route::get('statisMoney/{id}','easy\detailController@statisMoney');
Route::get('ajaxGetPromotion','easy\detailController@ajaxGetPromotion');
Route::get('ajaxGetAnalysis','easy\detailController@ajaxGetAnalysis');
Route::get('StatisInDay','easy\detailController@StatisInDay');
Route::get('StatisInWeek','easy\detailController@StatisInWeek');
Route::get('StatisInMonth','easy\detailController@StatisInMonth');
Route::get('StatisInYear','easy\detailController@StatisInYear');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/manual', function () {
    return view('manuals');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
