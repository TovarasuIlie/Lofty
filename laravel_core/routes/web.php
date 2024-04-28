<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MadeToMeasureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementUsersController;
use App\Http\Controllers\AccountCreateController;
use App\Http\Controllers\CreateAccountLinkController;
use App\Http\Controllers\LocationChangeController;
use App\Http\Controllers\OrdersController;
use App\Http\Livewire\AccountDetailsComponent;
use App\Http\Livewire\AccountManagementComponent;
use App\Http\Livewire\GenerateLinkComponent;
use App\Http\Livewire\LoginDashboard;
use App\Http\Livewire\SitePages\AboutUsComponent;
use App\Http\Livewire\SitePages\ClothingConsultancyComponent;
use App\Http\Livewire\SitePages\ContactComponent;
use App\Http\Livewire\SitePages\DressRentalComponent;
use App\Http\Livewire\SitePages\FashionDesignComponent;
use App\Http\Livewire\SitePages\GalleryComponent;
use App\Http\Livewire\SitePages\IndexComponent;
use App\Http\Livewire\SitePages\MadeToMeasureComponent;
use App\Http\Livewire\SitePages\ShopPolicyComponent;
use App\Http\Livewire\SitePages\TailoringWorkshopComponent;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\LocationChangeMiddleware;
use App\Http\Middleware\ManagerArea;
use App\Http\Middleware\RedirectIfAuthenticated;

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

Route::get('/', IndexComponent::class);

Route::get('/despre-noi', AboutUsComponent::class);

Route::get('/made-to-measure', MadeToMeasureComponent::class);

Route::post('/made-to-measure/placeOrder', [MadeToMeasureController::class, 'placeOrder']);

Route::get('/design-vestimentar', FashionDesignComponent::class);

Route::get('/consultanta-vestimentara', ClothingConsultancyComponent::class);

Route::get('/inchiriere-rochii', DressRentalComponent::class);

Route::get('/atelier-croitorie-copii', TailoringWorkshopComponent::class);

// Route::get('/colaboranti', function () {
//     return view('collaborations');
// });

Route::get('/galerie-foto', GalleryComponent::class);

Route::get('/contact', ContactComponent::class);

Route::get('/politica-magazin', ShopPolicyComponent::class);

Route::prefix('dashboard')->group(function () {
    Route::get('/logare', LoginDashboard::class)->middleware([RedirectIfAuthenticated::class]);

    Route::get('/inregistrare', function () {
        return view('dashboard/account/register-page');
    });

    Route::get('/inregistrare/verifyLink', [CreateAccountLinkController::class, 'verifyLink']);
    Route::post('/inregistrare/register', [DashboardController::class, 'register']);

    // Route::get('/logare', function () {
    //     return view('dashboard/account/login-page');
    // });

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
            // Route::get('/gestionare-conturi', [ManagementUsersController::class, 'index']);

            Route::get('/gestionare-conturi', AccountManagementComponent::class);

            Route::prefix('gestionare-cont')->group(function() {
                // Route::get('/{id}', [ManagementUsersController::class, 'show']);
                Route::get('/{user}', AccountDetailsComponent::class);

                Route::get('/deleteAccount/{id}', [ManagementUsersController::class, 'destroy']);
                Route::get('/makeClient/{id}', [ManagementUsersController::class, 'makeClient']);
                Route::get('/makeAdmin/{id}', [ManagementUsersController::class, 'makeAdmin']);
                Route::get('/makeManager/{id}', [ManagementUsersController::class, 'makeManager']);
                Route::get('/logs/{id}', [ManagementUsersController::class, 'viewAccountLogsPage']);
            });
    
            Route::prefix('link-creare-cont')->group(function () {
                // Route::get('', [CreateAccountLinkController::class, 'index']);
                Route::get('', GenerateLinkComponent::class);
                
                // Route::post('/generateAccountToken', [CreateAccountLinkController::class, 'store']);
        
                // Route::get('/destroyLink/{id}', [CreateAccountLinkController::class, 'destroy']);
            });
        });
    });
});