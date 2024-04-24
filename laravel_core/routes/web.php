<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MadeToMeasureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementUsersController;
use App\Http\Controllers\AccountCreateController;
use App\Http\Controllers\CreateAccountLinkController;
use App\Http\Controllers\LocationChangeController;
use App\Http\Controllers\OrdersController;
use App\Http\Livewire\Test;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\LocationChangeMiddleware;
use App\Http\Middleware\ManagerArea;

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

Route::get('/testlivewire', Test::class);

Route::prefix('dashboard')->group(function () {
    Route::get('/inregistrare', function () {
        return view('dashboard/account/register-page');
    });

    Route::get('/inregistrare/verifyLink', [CreateAccountLinkController::class, 'verifyLink']);
    Route::post('/inregistrare/register', [DashboardController::class, 'register']);

    Route::get('/logare', function () {
        return view('dashboard/account/login-page');
    });

    Route::get('/verificare', [LocationChangeController::class, 'viewPage']);

    Route::post('/verificare/verifyAccount', [LocationChangeController::class, 'verifyAccount']);

    Route::post('/logare/login', [DashboardController::class, 'login']);

    Route::get('/logare/logout', [DashboardController::class, 'logout']);

    Route::group(['prefix' => '', 'middleware' => [AdminAuth::class]], function() {
        Route::get('', function () {
            return view('dashboard/index-page');
        });
    
        Route::get('/made-to-measure/comenzi-noi', [OrdersController::class, 'viewNewOrdersPage']);
        Route::get('/made-to-measure/comanda/{id}', [OrdersController::class, 'viewOrderDetailsPage']);
        Route::get('/made-to-measure/comenzi-noi/comanda/markFinished/{id}', [OrdersController::class, 'markFinished']);
        Route::get('/made-to-measure/comenzi-noi/comanda/unmarkFinished/{id}', [OrdersController::class, 'unmarkFinished']);
        
        Route::get('/made-to-measure/comenzi-finalizate', [OrdersController::class, 'viewFinishedOrdersPage']);
    
        Route::group(['prefix' => 'conturi', 'middleware' => [ManagerArea::class]], function () {
            Route::get('/gestionare-conturi', [ManagementUsersController::class, 'index']);
            Route::prefix('gestionare-cont')->group(function() {
                Route::get('/{id}', [ManagementUsersController::class, 'show']);
                Route::get('/deleteAccount/{id}', [ManagementUsersController::class, 'destroy']);
                Route::get('/makeClient/{id}', [ManagementUsersController::class, 'makeClient']);
                Route::get('/makeAdmin/{id}', [ManagementUsersController::class, 'makeAdmin']);
                Route::get('/makeManager/{id}', [ManagementUsersController::class, 'makeManager']);
                Route::get('/logs/{id}', [ManagementUsersController::class, 'viewAccountLogsPage']);
            });
    
            Route::prefix('link-creare-cont')->group(function () {
                Route::get('', [CreateAccountLinkController::class, 'index']);
                
                Route::post('/generateAccountToken', [CreateAccountLinkController::class, 'store']);
        
                Route::get('/destroyLink/{id}', [CreateAccountLinkController::class, 'destroy']);
            });
        });
    });
});