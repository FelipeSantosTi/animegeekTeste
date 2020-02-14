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

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

        /** Formulário de Login */
        Route::get('/', 'AuthController@showLoginForm')->name('login');
        Route::post('login', 'AuthController@login')->name('login.do');

        /** Rotas Protegidas */
        Route::group(['middleware' => ['auth']], function () {

            /** Dashboard Home */
            Route::get('home', 'AuthController@home')->name('home');

            /** Usuários */
            Route::get('users/team', 'UserController@team')->name('users.team');
            Route::resource('users', 'UserController');

            /** Ingressos */
            Route::get('tickets/print', 'TicketController@makeTicket')->name('tickets.print');
            Route::get('tickets/control', 'TicketController@control')->name('tickets.control');
            Route::resource('tickets', 'TicketController');


    });

    /** Logout */
    Route::get('logout', 'AuthController@logout')->name('logout');

});

