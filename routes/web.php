<?php

use App\Models\GeoData;
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

Route::get('/', function () {
    // $query = GeoData::geofence(23.8748792, 90.3809990, 0, 5);
    // return $data = $query->get();

    return view('location');
});
