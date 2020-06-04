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

Route::get('/', 'ListingsController@index')->name('listing.index');

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

Route::post('card/{card}/favorites', 'CardFavoriteController@store')->name('cardFavorites');

Route::post('card/{card}/unfavorites', 'CardFavoriteController@destroy')->name('cardUnfavorites');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/twitter', 'Auth\LoginController@redirectToProvider')->name('login.twitter');

Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallback');
