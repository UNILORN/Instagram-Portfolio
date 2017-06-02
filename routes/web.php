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

use App\Service\LocalInstagram;

Route::get('/', function () {

    $instagram = new LocalInstagram();
    dd($instagram->getAllColumn());
    dd($instagram->putAllColumn());
    return view('top');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin/top');
    });
    Route::post('/instagram/all', function () {

        return redirect('/admin');
    });
});

Auth::routes();
