<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/portfolio/create', 'PortfolioController@create');
Route::get('/portfolio/import', 'PortfolioController@import');
Route::post('/portfolio/import', 'PortfolioController@import_store');
Route::post('/portfolio', 'PortfolioController@store');
