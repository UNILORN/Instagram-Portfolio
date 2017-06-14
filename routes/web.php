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

use App\Model\Image;
use App\Service\LocalInstagram;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


Route::get('/', function () {
    $images = Image::paginate(9);
    return view('top',compact('images'));
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin/top');
    });
    Route::get('/instagram/all', function () {
        $instagram = new LocalInstagram();
        $result = $instagram->putAllColumn();
        return redirect('/admin');
    });
});

Auth::routes();
