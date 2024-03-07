<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MadeToMeasureController;

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
    return view('index-page');
});

Route::get('/despre-noi', function () {
    return view('about_us');
});

// Route::get('/tinute', function () {
//     return view('outfits');
// });

Route::get('/made-to-measure', function () {
    return view('made-to-measure');
});

Route::post('/made-to-measure/placeOrder', [MadeToMeasureController::class, 'placeOrder']);

Route::get('/design-vestimentar', function () {
    return view('fashion-design');
});

Route::get('/consultanta-vestimentara', function () {
    return view('clothing-consultancy');
});

Route::get('/inchiriere-rochii', function () {
    return view('dress-rental');
});

Route::get('/atelier-croitorie-copii', function () {
    return view('tailoring-workshop');
});

// Route::get('/colaboranti', function () {
//     return view('collaborations');
// });


Route::get('/galerie-foto', function () {
    return view('gallery');
});

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/politica-magazin', function () {
    return view('shop-policy');
});