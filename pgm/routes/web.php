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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/description', function () {
    return view('about.description');
});*/
/*------------- Appel directe d'une méthode se trouvant dans le controller  */
//Route::get('/','AboutController@bonsoir');


Route::get('/', 'AboutController@index');
Route::get('/about', 'AboutController@about');
Route::get('/contact', 'AboutController@contact');
Route::resource('posts', 'PostsController');
Route::resource('members', 'MembersController');
Route::resource('coursAsso', 'CoursController');
Route::resource('saisons', 'SaisonsController');
Route::resource('teams', 'TeamsController');
Route::resource('cats', 'CatsController');
Route::resource('fonctions', 'FonctionsController');
Route::resource('evenements', 'EventsController');
Auth::routes();
Route::get('logout', 'Auth\LoginController@getLogout');
Route::get('/home', 'HomeController@index')->name('home');
