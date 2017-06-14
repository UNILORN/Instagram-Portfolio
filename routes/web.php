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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


Route::get('/', function () {
    $images = Image::orderBy('created','desc')->paginate(9);
    $news = Image::select('link','created')
        ->where('created','>',date("Y-m-d H:m:s",strtotime("-2 week")))
        ->distinct()
        ->orderBy('created','desc')
        ->get();

    return view('top',compact('images','news'));
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
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
