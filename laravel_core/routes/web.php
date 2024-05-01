<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MadeToMeasureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementUsersController;
use App\Http\Controllers\CreateAccountLinkController;
use App\Http\Controllers\LocationChangeController;
use App\Http\Controllers\OrdersController;
use App\Http\Livewire\Dashboard\ManagerArea\AccountDetailsComponent;
use App\Http\Livewire\Dashboard\ManagerArea\AccountManagementComponent;
use App\Http\Livewire\Dashboard\Authentification\LoginDashboard as AuthentificationLoginDashboard;
use App\Http\Livewire\Dashboard\Authentification\RegisterDashboard;
use App\Http\Livewire\Dashboard\Authentification\ResetPasswordDashboard;
use App\Http\Livewire\Dashboard\Index\IndexComponent as IndexIndexComponent;
use App\Http\Livewire\Dashboard\MadeToMeasure\FinishedOrders;
use App\Http\Livewire\Dashboard\MadeToMeasure\NewOrders;
use App\Http\Livewire\Dashboard\MadeToMeasure\ViewOrder;
use App\Http\Livewire\Dashboard\ManagerArea\AccountLogsComponent;
use App\Http\Livewire\Dashboard\ManagerArea\GenerateLinkComponent;
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
    Route::get('/logare', AuthentificationLoginDashboard::class)->middleware([RedirectIfAuthenticated::class]);

    Route::get('/logare/logout', [DashboardController::class, 'logout']);

    Route::get('/inregistrare/{token}', RegisterDashboard::class)->middleware([RedirectIfAuthenticated::class]);

    Route::get('/reseteaza-parola/{token}', ResetPasswordDashboard::class)->middleware([RedirectIfAuthenticated::class]);

    Route::get('/verificare', [LocationChangeController::class, 'viewPage']);

    Route::post('/verificare/verifyAccount', [LocationChangeController::class, 'verifyAccount']);

    Route::group(['prefix' => '', 'middleware' => [AdminAuth::class]], function() {
        Route::get('', IndexIndexComponent::class);
    
        // Route::get('/made-to-measure/comenzi-noi', [OrdersController::class, 'viewNewOrdersPage']);
        Route::get('/made-to-measure/comenzi-noi', NewOrders::class);
        Route::get('/made-to-measure/comanda/{order}', ViewOrder::class);
        
        Route::get('/made-to-measure/comenzi-finalizate', FinishedOrders::class);
    
        Route::group(['prefix' => 'conturi', 'middleware' => [ManagerArea::class]], function () {
            Route::get('/gestionare-conturi', AccountManagementComponent::class);

            Route::prefix('gestionare-cont')->group(function() {
                Route::get('/{user}', AccountDetailsComponent::class);
                Route::get('/logs/{userId}', AccountLogsComponent::class);
            });
    
            Route::prefix('link-creare-cont')->group(function () {
                Route::get('', GenerateLinkComponent::class);
            });
        });
    });
});