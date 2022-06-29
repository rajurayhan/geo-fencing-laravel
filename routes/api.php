<?php

use App\Models\GeoData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/friend-near-by', function (Request $request) {

    return $request->all();
    $position = [
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
    ];

    $radius = $request->radius ?? 5;

    $query = GeoData::geofence($position['latitude'], $position['longitude'], 0, $radius);
    $data = $query->get();

    // return response()->json($data);

    $html = view('nearby-table', compact('data'))->render();

    return $html;
});
