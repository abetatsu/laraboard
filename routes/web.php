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
//     return view('welcome');
// });

Route::get('/', 'ListingsController@index');

Route::get('/new', 'ListingsController@new');

Route::post('/listings', 'ListingsController@store');

Route::get('/listingsedit/{listing_id}', 'ListingsController@edit');

Route::post('/listing/edit', 'ListingsController@update');

Route::get('/listingsdelete/{listing_id}', 'ListingsController@destroy');

Route::get('/listing/{user_id}/{listing_id}/card/new', 'CardsController@new');

Route::post('/listing/{user_id}/{listing_id}/card', 'CardsController@store');

Route::get('/listing/{listing_id}/card/{card_id}', 'CardsController@show');

Route::get('/listing/{listing_id}/card/{card_id}/edit', 'CardsController@edit');

Route::post('/card/edit', 'CardsController@update');

Route::get('/listing/{listing_id}/card/{card_id}/delete', 'CardsController@destroy');

Route::post('listing/{listing}/favorites', 'FavoriteController@store')->name('favorites');

Route::post('listing/{listing}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
