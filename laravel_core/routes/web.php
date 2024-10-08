<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationChangeController;
use App\Http\Livewire\Dashboard\ManagerArea\AccountDetailsComponent;
use App\Http\Livewire\Dashboard\ManagerArea\AccountManagementComponent;
use App\Http\Livewire\Dashboard\Authentification\LoginDashboard as AuthentificationLoginDashboard;
use App\Http\Livewire\Dashboard\Authentification\RegisterDashboard;
use App\Http\Livewire\Dashboard\Authentification\ResetPasswordDashboard;
use App\Http\Livewire\Dashboard\Authentification\VerifyIPComponent;
use App\Http\Livewire\Dashboard\Contact\ContactComponent as DashboardContactComponent;
use App\Http\Livewire\Dashboard\Contact\ViewMessageComponent;
use App\Http\Livewire\Dashboard\Index\IndexComponent as IndexIndexComponent;
use App\Http\Livewire\Dashboard\MadeToMeasure\FinishedOrders;
use App\Http\Livewire\Dashboard\MadeToMeasure\NewOrders;
use App\Http\Livewire\Dashboard\MadeToMeasure\ViewOrder;
use App\Http\Livewire\Dashboard\Maintenance\ActiveJobsListComponent;
use App\Http\Livewire\Dashboard\Maintenance\FailedJobsListComponent;
use App\Http\Livewire\Dashboard\Maintenance\FailedJobComponent;
use App\Http\Livewire\Dashboard\Maintenance\MaintenanceCompponent;
use App\Http\Livewire\Dashboard\Maintenance\VisitsTrackerComponent;
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
use App\Http\Middleware\TrackVisits;

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

Route::get('/', IndexComponent::class)->middleware([TrackVisits::class]);

Route::get('/despre-noi', AboutUsComponent::class)->middleware([TrackVisits::class]);

Route::get('/made-to-measure', MadeToMeasureComponent::class)->middleware([TrackVisits::class]);

Route::get('/design-vestimentar', FashionDesignComponent::class)->middleware([TrackVisits::class]);

Route::get('/consultanta-vestimentara', ClothingConsultancyComponent::class)->middleware([TrackVisits::class]);

Route::get('/inchiriere-rochii', DressRentalComponent::class)->middleware([TrackVisits::class]);

Route::get('/atelier-croitorie-copii', TailoringWorkshopComponent::class)->middleware([TrackVisits::class]);

// Route::get('/colaboranti', function () {
//     return view('collaborations');
// });

Route::get('/galerie-foto', GalleryComponent::class)->middleware([TrackVisits::class]);

Route::get('/contact', ContactComponent::class)->middleware([TrackVisits::class]);

Route::get('/politica-magazin', ShopPolicyComponent::class)->middleware([TrackVisits::class]);

Route::prefix('dashboard')->group(function () {
    Route::get('/logare', AuthentificationLoginDashboard::class)->middleware([RedirectIfAuthenticated::class]);
    Route::get('/logare/verificare-cont', VerifyIPComponent::class);

    Route::get('/logare/logout', [DashboardController::class, 'logout']);

    Route::get('/inregistrare/{token}', RegisterDashboard::class)->middleware([RedirectIfAuthenticated::class]);

    Route::get('/reseteaza-parola/{token}', ResetPasswordDashboard::class)->middleware([RedirectIfAuthenticated::class]);

    Route::group(['prefix' => '', 'middleware' => [AdminAuth::class, LocationChangeMiddleware::class]], function() {
        Route::get('', IndexIndexComponent::class);
    
        Route::get('/made-to-measure/comenzi-noi', NewOrders::class);
        Route::get('/made-to-measure/comanda/{order}', ViewOrder::class);
        Route::get('/made-to-measure/comenzi-finalizate', FinishedOrders::class);

        Route::get('/contact/mesaje', DashboardContactComponent::class);
        Route::get('/contact/vezi-mesaj/{message}', ViewMessageComponent::class);
    
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

        Route::group(['prefix' => 'maintenance', 'middleware' => [ManagerArea::class]], function() {
            Route::get('', MaintenanceCompponent::class);
            Route::get('/active-jobs', ActiveJobsListComponent::class);
            Route::get('/visits-tracker', VisitsTrackerComponent::class);

            Route::get('/failed-jobs', FailedJobsListComponent::class);
            Route::get('/failed-jobs/job/{uuid}', FailedJobComponent::class);
        });
    });
});