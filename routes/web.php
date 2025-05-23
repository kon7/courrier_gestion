<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', function () {return view('home');})->name('home');
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/help', function () {return view('help');})->name('help');
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'loginadmin'])->name('login');
Route::post('/logout', [AuthController::class, 'logoutadmin'])->name('logout');
Route::get('/admin/users', [AuthController::class, 'showUserManagement'])->name('admin.users');
Route::post('/admin/users/add', [AuthController::class, 'register'])->name('admin.users.add');
Route::get('/admin/users/list', [AuthController::class, 'getUsers'])->name('admin.users.list');
Route::middleware(['auth'])->group(function () {});

/***************************************** Module Utilisateur **********************************************/
// role
Route::group(['prefix' => 'utilisateur/roles'], function () {
    Route::get('/', 'App\Http\Controllers\RoleController@index')->name('utilisateur.roles.index');
    Route::get('/load', 'App\Http\Controllers\RoleController@load')->name('utilisateur.roles.load');
    Route::get('/create', 'App\Http\Controllers\RoleController@create')->name('utilisateur.roles.create');
    Route::post('/store', 'App\Http\Controllers\RoleController@store')->name('utilisateur.roles.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\RoleController@edit')->name('utilisateur.roles.edit');
    Route::patch('/{id}/update', 'App\Http\Controllers\RoleController@update')->name('utilisateur.roles.update');
    Route::post('/{id}/delete', 'App\Http\Controllers\RoleController@delete')->name('utilisateur.roles.delete');
    Route::get('/{id}/show', 'App\Http\Controllers\RoleController@show')->name('utilisateur.roles.show');
});
// user
Route::group(['prefix' => 'utilisateur/users'], function () {
    Route::get('/', 'App\Http\Controllers\UtilisateurController@index')->name('utilisateur.users.index');
    Route::get('/load', 'App\Http\Controllers\UtilisateurController@load')->name('utilisateur.users.load');
    Route::get('/create', 'App\Http\Controllers\UtilisateurController@create')->name('utilisateur.users.create');
    Route::post('/store', 'App\Http\Controllers\UtilisateurController@store')->name('utilisateur.users.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\UtilisateurController@edit')->name('utilisateur.users.edit');
    Route::patch('/{id}/update', 'App\Http\Controllers\UtilisateurController@update')->name('utilisateur.users.update');
    Route::post('/{id}/delete', 'App\Http\Controllers\UtilisateurController@delete')->name('utilisateur.users.delete');
    Route::get('/{id}/show', 'App\Http\Controllers\UtilisateurController@show')->name('utilisateur.users.show');
});
/***************************************** Module Client **********************************************/
// domaine
Route::group(['prefix' => 'client/domaines'], function () {
    Route::get('/', 'App\Http\Controllers\DomaineController@index')->name('client.domaines.index');
    Route::get('/load', 'App\Http\Controllers\DomaineController@load')->name('client.domaines.load');
    Route::get('/create', 'App\Http\Controllers\DomaineController@create')->name('client.domaines.create');
    Route::post('/store', 'App\Http\Controllers\DomaineController@store')->name('client.domaines.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\DomaineController@edit')->name('client.domaines.edit');
    Route::patch('/{id}/update', 'App\Http\Controllers\DomaineController@update')->name('client.domaines.update');
    Route::post('/{id}/delete', 'App\Http\Controllers\DomaineController@delete')->name('client.domaines.delete');
    Route::get('/{id}/show', 'App\Http\Controllers\DomaineController@show')->name('client.domaines.show');
});
// client
Route::group(['prefix' => 'client/clients'], function () {
    Route::get('/', 'App\Http\Controllers\clientController@index')->name('client.clients.index');
    Route::get('/load', 'App\Http\Controllers\clientController@load')->name('client.clients.load');
    Route::get('/create', 'App\Http\Controllers\clientController@create')->name('client.clients.create');
    Route::post('/store', 'App\Http\Controllers\clientController@store')->name('client.clients.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\clientController@edit')->name('client.clients.edit');
    Route::patch('/{id}/update', 'App\Http\Controllers\clientController@update')->name('client.clients.update');
    Route::post('/{id}/delete', 'App\Http\Controllers\clientController@delete')->name('client.clients.delete');
    Route::get('/{id}/show', 'App\Http\Controllers\clientController@show')->name('client.clients.show');
});

// statistique
Route::get('get_stat/{deb}/{fin}', 'App\Http\Controllers\StatistiqueController@get_stat')->name('homes.statistiques.get_stats');
