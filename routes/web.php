<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('/');




// Guest Users
Route::middleware(['guest','PreventBackHistory'])->group(function()
{
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'] )->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('signin');
    Route::get('register', [App\Http\Controllers\Admin\AuthController::class, 'showRegister'] )->name('register');
    Route::post('registers', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('signup');

});


// Authenticated users
Route::middleware(['auth','PreventBackHistory'])->group(function()
{

    // Auth Routes
    Route::get('home', fn () => redirect()->route('dashboard'))->name('home');
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');
    Route::get('change-theme-mode', [App\Http\Controllers\Admin\DashboardController::class, 'changeThemeMode'])->name('change-theme-mode');
    Route::get('show-change-password', [App\Http\Controllers\Admin\AuthController::class, 'showChangePassword'] )->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'] )->name('change-password');

    // Masters
    Route::resource('wards', App\Http\Controllers\Admin\Masters\WardController::class );
    Route::resource('category', App\Http\Controllers\Admin\Masters\CategoryController::class );
    Route::resource('scheme', App\Http\Controllers\Admin\Masters\SchemeController::class );
    Route::resource('document', App\Http\Controllers\Admin\Masters\DocumentController::class );
    Route::resource('financial', App\Http\Controllers\Admin\Masters\FinancialController::class );
    Route::resource('terms-conditions', App\Http\Controllers\Admin\Masters\TermsAndConditionsController::class );

    // User Panel
    Route::get('pdf_design', [App\Http\Controllers\Admin\Masters\DivyangController::class, 'pdf']);

    Route::get('terms_conditions/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'terms_conditions'])->name('terms_conditions');
    Route::resource('hayatichaDakhlaform', App\Http\Controllers\Admin\Masters\DivyangController::class);
    Route::put('hayatichaDakhlaform/{id}/upload', [App\Http\Controllers\Admin\Masters\DivyangController::class, 'hayatuploadfile' ])->name('hayatichaDakhlaform.upload');

    Route::get('uploaded-document', [App\Http\Controllers\User\DivyangSchemeController::class, 'uploaded_doc']);
    // Divyang Scheme Application
    Route::resource('scheme_form', App\Http\Controllers\User\DivyangSchemeController::class);
    Route::get('divyang_certificate/{id}', [App\Http\Controllers\User\DivyangSchemeController::class, 'generateCertificate']);
    Route::get('divyang_view/{id}', [App\Http\Controllers\User\DivyangSchemeController::class, 'divyangRegistrationView']);
    Route::get('divyang_certificate_view/{id}', [App\Http\Controllers\User\DivyangSchemeController::class, 'divyangCertificate']);
    // Bus Concession Scheme Application
    Route::resource('bus_concession', App\Http\Controllers\User\BusConcessionSchemeController::class);
    Route::get('bus_concession_certificate/{id}', [App\Http\Controllers\User\BusConcessionSchemeController::class, 'generateCertificate']);
    Route::get('bus_concession_view/{id}', [App\Http\Controllers\User\BusConcessionSchemeController::class, 'busConcessionApplicationView']);
    Route::get('bus_concession_certificate_view/{id}', [App\Http\Controllers\User\BusConcessionSchemeController::class, 'busConcessionCertificate']);
    // Cancer Scheme Application
    Route::resource('cancer_scheme', App\Http\Controllers\User\CancerSchemeController::class);
    Route::get('cancer_certificate/{id}', [App\Http\Controllers\User\CancerSchemeController::class, 'generateCertificate']);
    Route::get('cancer_view/{id}', [App\Http\Controllers\User\CancerSchemeController::class, 'cancerSchemeApplicationView']);
    Route::get('cancer_scheme_certificate_view', [App\Http\Controllers\User\CancerSchemeController::class, 'cancerSchemeCertificate']);
    // Education Scheme Application
    Route::resource('education_scheme', App\Http\Controllers\User\EducationSchemeController::class);
    Route::get('education_certificate/{id}', [App\Http\Controllers\User\EducationSchemeController::class, 'generateCertificate']);
    Route::get('education_view/{id}', [App\Http\Controllers\User\EducationSchemeController::class, 'eductationSchemeApplicationView']);
    Route::get('education_scheme_certificate_view/{id}', [App\Http\Controllers\User\EducationSchemeController::class, 'educationSchemeCertificate']);
    // Marriage Scheme Application
    Route::resource('marriage_scheme', App\Http\Controllers\User\MarriageSchemeController::class);
    Route::get('marriage_certificate/{id}', [App\Http\Controllers\User\MarriageSchemeController::class, 'generateCertificate']);
    Route::get('marriage_view/{id}', [App\Http\Controllers\User\MarriageSchemeController::class, 'marriageSchemeApplicationView']);
    // Sports Scheme Application
    Route::resource('sports_scheme', App\Http\Controllers\User\SportsSchemeController::class);
    Route::get('sports_certificate/{id}', [App\Http\Controllers\User\SportsSchemeController::class, 'generateCertificate']);
    Route::get('sports_view/{id}', [App\Http\Controllers\User\SportsSchemeController::class, 'sportsSchemeApplicationView']);
    Route::get('sports_scheme_certificate_view', [App\Http\Controllers\User\SportsSchemeController::class, 'sportsSchemeCertificate']);
    // Vehicle Scheme Application
    Route::resource('vehicle_scheme', App\Http\Controllers\User\VehicleSchemeController::class);
    Route::get('vehicle_certificate/{id}', [App\Http\Controllers\User\VehicleSchemeController::class, 'generateCertificate']);
    Route::get('vehicle_view/{id}', [App\Http\Controllers\User\VehicleSchemeController::class, 'vehicleSchemeApplicationView']);
    Route::get('vehicle_scheme_certificate_view', [App\Http\Controllers\User\VehicleSchemeController::class, 'vehicleSchemeCertificate']);
    // Women Sewing/Beautisians Scheme Application
    Route::resource('women_scheme', App\Http\Controllers\User\WomenSewingSchemeController::class);
    Route::get('women_certificate/{id}', [App\Http\Controllers\User\WomenSewingSchemeController::class, 'generateCertificate']);
    Route::get('women_view/{id}', [App\Http\Controllers\User\WomenSewingSchemeController::class, 'womenSchemeApplicationView']);
    Route::get('women_scheme_certificate_view', [App\Http\Controllers\User\WomenSewingSchemeController::class, 'womenSchemeCertificate']);

    // Hod Panel
    // Divyang Scheme Application
    Route::get('divyang_registration_list/{status}', [App\Http\Controllers\Hod\HodDivyangSchemeController::class, 'divyangRegistrationList']);
    Route::get('divyang_registration_view/{id}/{status}', [App\Http\Controllers\Hod\HodDivyangSchemeController::class, 'divyangRegistrationView']);
    Route::post('divyang_application_reject_by_hod/{id}', [App\Http\Controllers\Hod\HodDivyangSchemeController::class, 'rejectDivyangApplication']);
    Route::get('divyang_application_approve_by_hod/{id}', [App\Http\Controllers\Hod\HodDivyangSchemeController::class, 'approveDivyangApplication']);
    // Bus Concession Scheme Application
    Route::get('bus_concession_application_list/{status}', [App\Http\Controllers\Hod\HodBusConcessionSchemeController::class, 'busConcessionApplicationList']);
    Route::get('bus_concession_application_view/{id}/{status}', [App\Http\Controllers\Hod\HodBusConcessionSchemeController::class, 'busConcessionApplicationView']);
    Route::post('bus_concession_application_reject_by_hod/{id}', [App\Http\Controllers\Hod\HodBusConcessionSchemeController::class, 'rejectBusConcessionApplication']);
    Route::get('bus_concession_application_approve_by_hod/{id}', [App\Http\Controllers\Hod\HodBusConcessionSchemeController::class, 'approveBusConcessionApplication']);
    // Education Scheme Application
    Route::get('education_scheme_application_list/{status}', [App\Http\Controllers\Hod\HodEducationSchemeController::class, 'eductationSchemeApplicationList']);
    Route::get('education_scheme_application_view/{id}/{status}', [App\Http\Controllers\Hod\HodEducationSchemeController::class, 'eductationSchemeApplicationView']);
    Route::post('education_scheme_application_reject_by_hod/{id}', [App\Http\Controllers\Hod\HodEducationSchemeController::class, 'rejectEductationSchemeApplication']);
    Route::get('education_scheme_application_approve_by_hod/{id}', [App\Http\Controllers\Hod\HodEducationSchemeController::class, 'approveEducationSchemeApplication']);
    // Marriage Scheme Application
    Route::get('marriage_scheme_application_list/{status}', [App\Http\Controllers\Hod\HodMarriageSchemeController::class, 'marriageSchemeApplicationList']);
    Route::get('marriage_scheme_application_view/{id}/{status}', [App\Http\Controllers\Hod\HodMarriageSchemeController::class, 'marriageSchemeApplicationView']);
    Route::post('marriage_scheme_application_reject_by_hod/{id}', [App\Http\Controllers\Hod\HodMarriageSchemeController::class, 'rejectMarriageSchemeApplication']);
    Route::get('marriage_scheme_application_approve_by_hod/{id}', [App\Http\Controllers\Hod\HodMarriageSchemeController::class, 'approveMarriageSchemeApplication']);
    // Cancer Scheme Application
    Route::get('cancer_scheme_application_list/{status}', [App\Http\Controllers\Hod\HodCancerSchemeController::class, 'cancerSchemeApplicationList']);
    Route::get('cancer_scheme_application_view/{id}/{status}', [App\Http\Controllers\Hod\HodCancerSchemeController::class, 'cancerSchemeApplicationView']);
    Route::post('cancer_scheme_application_reject_by_hod/{id}', [App\Http\Controllers\Hod\HodCancerSchemeController::class, 'rejectCancerSchemeApplication']);
    Route::get('cancer_scheme_application_approve_by_hod/{id}', [App\Http\Controllers\Hod\HodCancerSchemeController::class, 'approveCancerSchemeApplication']);
    // Sports Scheme Application
    Route::get('sports_scheme_application_list/{status}', [App\Http\Controllers\Hod\HodSportsSchemeController::class, 'sportsSchemeApplicationList']);
    Route::get('sports_scheme_application_view/{id}/{status}', [App\Http\Controllers\Hod\HodSportsSchemeController::class, 'sportsSchemeApplicationView']);
    Route::post('sports_scheme_application_reject_by_hod/{id}', [App\Http\Controllers\Hod\HodSportsSchemeController::class, 'rejectSportsSchemeApplication']);
    Route::get('sports_scheme_application_approve_by_hod/{id}', [App\Http\Controllers\Hod\HodSportsSchemeController::class, 'approveSportsSchemeApplication']);
    // Vehicle Scheme Application
    Route::get('vehicle_scheme_application_list/{status}', [App\Http\Controllers\Hod\HodVehicleSchemeController::class, 'vehicleSchemeApplicationList']);
    Route::get('vehicle_scheme_application_view/{id}/{status}', [App\Http\Controllers\Hod\HodVehicleSchemeController::class, 'vehicleSchemeApplicationView']);
    Route::post('vehicle_scheme_application_reject_by_hod/{id}', [App\Http\Controllers\Hod\HodVehicleSchemeController::class, 'rejectVehicleSchemeApplication']);
    Route::get('vehicle_scheme_application_approve_by_hod/{id}', [App\Http\Controllers\Hod\HodVehicleSchemeController::class, 'approveVehicleSchemeApplication']);
    // Women Sewing/Beautisians Scheme Application
    Route::get('women_scheme_application_list/{status}', [App\Http\Controllers\Hod\HodWomenSchemeController::class, 'womenSchemeApplicationList']);
    Route::get('women_scheme_application_view/{id}/{status}', [App\Http\Controllers\Hod\HodWomenSchemeController::class, 'womenSchemeApplicationView']);
    Route::post('women_scheme_application_reject_by_hod/{id}', [App\Http\Controllers\Hod\HodWomenSchemeController::class, 'rejectWomenSchemeApplication']);
    Route::get('women_scheme_application_approve_by_hod/{id}', [App\Http\Controllers\Hod\HodWomenSchemeController::class, 'approveWomenSchemeApplication']);

    // AC Panel
    // Divyang Scheme Application
    Route::get('ac_divyang_registration_list/{status}', [App\Http\Controllers\Ac\AcDivyangSchemeController::class, 'divyangRegistrationList']);
    Route::get('ac_divyang_registration_view/{id}/{status}', [App\Http\Controllers\Ac\AcDivyangSchemeController::class, 'divyangRegistrationView']);
    Route::post('divyang_application_reject_by_ac/{id}', [App\Http\Controllers\Ac\AcDivyangSchemeController::class, 'rejectDivyangApplication']);
    Route::get('divyang_application_approve_by_ac/{id}', [App\Http\Controllers\Ac\AcDivyangSchemeController::class, 'approveDivyangApplication']);
    // Bus Concession Scheme Application
    Route::get('ac_bus_concession_application_list/{status}', [App\Http\Controllers\Ac\AcBusConcessionSchemeController::class, 'busConcessionApplicationList']);
    Route::get('ac_bus_concession_application_view/{id}/{status}', [App\Http\Controllers\Ac\AcBusConcessionSchemeController::class, 'busConcessionApplicationView']);
    Route::post('bus_concession_application_reject_by_ac/{id}', [App\Http\Controllers\Ac\AcBusConcessionSchemeController::class, 'rejectBusConcessionApplication']);
    Route::get('bus_concession_application_approve_by_ac/{id}', [App\Http\Controllers\Ac\AcBusConcessionSchemeController::class, 'approveBusConcessionApplication']);
    // Education Scheme Application
    Route::get('ac_education_scheme_application_list/{status}', [App\Http\Controllers\Ac\AcEducationSchemeController::class, 'eductationSchemeApplicationList']);
    Route::get('ac_education_scheme_application_view/{id}/{status}', [App\Http\Controllers\Ac\AcEducationSchemeController::class, 'eductationSchemeApplicationView']);
    Route::post('education_scheme_application_reject_by_ac/{id}', [App\Http\Controllers\Ac\AcEducationSchemeController::class, 'rejectEductationSchemeApplication']);
    Route::get('education_scheme_application_approve_by_ac/{id}', [App\Http\Controllers\Ac\AcEducationSchemeController::class, 'approveEducationSchemeApplication']);
      // Marriage Scheme Application
    Route::get('ac_marriage_scheme_application_list/{status}', [App\Http\Controllers\Ac\AcMarriageSchemeController::class, 'marriageSchemeApplicationList']);
    Route::get('ac_marriage_scheme_application_view/{id}/{status}', [App\Http\Controllers\Ac\AcMarriageSchemeController::class, 'marriageSchemeApplicationView']);
    Route::post('marriage_scheme_application_reject_by_ac/{id}', [App\Http\Controllers\Ac\AcMarriageSchemeController::class, 'rejectMarriageSchemeApplication']);
    Route::get('marriage_scheme_application_approve_by_ac/{id}', [App\Http\Controllers\Ac\AcMarriageSchemeController::class, 'approveMarriageSchemeApplication']);
    // Cancer Scheme Application
    Route::get('ac_cancer_scheme_application_list/{status}', [App\Http\Controllers\Ac\AcCancerSchemeController::class, 'cancerSchemeApplicationList']);
    Route::get('ac_cancer_scheme_application_view/{id}/{status}', [App\Http\Controllers\Ac\AcCancerSchemeController::class, 'cancerSchemeApplicationView']);
    Route::post('cancer_scheme_application_reject_by_ac/{id}', [App\Http\Controllers\Ac\AcCancerSchemeController::class, 'rejectCancerSchemeApplication']);
    Route::get('cancer_scheme_application_approve_by_ac/{id}', [App\Http\Controllers\Ac\AcCancerSchemeController::class, 'approveCancerSchemeApplication']);
    // Sports Scheme Application
    Route::get('ac_sports_scheme_application_list/{status}', [App\Http\Controllers\Ac\AcSportsSchemeController::class, 'sportsSchemeApplicationList']);
    Route::get('ac_sports_scheme_application_view/{id}/{status}', [App\Http\Controllers\Ac\AcSportsSchemeController::class, 'sportsSchemeApplicationView']);
    Route::post('sports_scheme_application_reject_by_ac/{id}', [App\Http\Controllers\Ac\AcSportsSchemeController::class, 'rejectSportsSchemeApplication']);
    Route::get('sports_scheme_application_approve_by_ac/{id}', [App\Http\Controllers\Ac\AcSportsSchemeController::class, 'approveSportsSchemeApplication']);
    // Vehicle Scheme Application
    Route::get('ac_vehicle_scheme_application_list/{status}', [App\Http\Controllers\Ac\AcVehicleSchemeController::class, 'vehicleSchemeApplicationList']);
    Route::get('ac_vehicle_scheme_application_view/{id}/{status}', [App\Http\Controllers\Ac\AcVehicleSchemeController::class, 'vehicleSchemeApplicationView']);
    Route::post('vehicle_scheme_application_reject_by_ac/{id}', [App\Http\Controllers\Ac\AcVehicleSchemeController::class, 'rejectVehicleSchemeApplication']);
    Route::get('vehicle_scheme_application_approve_by_ac/{id}', [App\Http\Controllers\Ac\AcVehicleSchemeController::class, 'approveVehicleSchemeApplication']);
      // Women Sewing/Beautisians Scheme Application
    Route::get('ac_women_scheme_application_list/{status}', [App\Http\Controllers\Ac\AcWomenSchemeController::class, 'womenSchemeApplicationList']);
    Route::get('ac_women_scheme_application_view/{id}/{status}', [App\Http\Controllers\Ac\AcWomenSchemeController::class, 'womenSchemeApplicationView']);
    Route::post('women_scheme_application_reject_by_ac/{id}', [App\Http\Controllers\Ac\AcWomenSchemeController::class, 'rejectWomenSchemeApplication']);
    Route::get('women_scheme_application_approve_by_ac/{id}', [App\Http\Controllers\Ac\AcWomenSchemeController::class, 'approveWomenSchemeApplication']);

    // AMC Panel
    // Divyang Scheme Application
    Route::get('amc_divyang_registration_list/{status}', [App\Http\Controllers\Amc\AmcDivyangSchemeController::class, 'divyangRegistrationList']);
    Route::get('amc_divyang_registration_view/{id}/{status}', [App\Http\Controllers\Amc\AmcDivyangSchemeController::class, 'divyangRegistrationView']);
    Route::post('divyang_application_reject_by_amc/{id}', [App\Http\Controllers\Amc\AmcDivyangSchemeController::class, 'rejectDivyangApplication']);
    Route::get('divyang_application_approve_by_amc/{id}', [App\Http\Controllers\Amc\AmcDivyangSchemeController::class, 'approveDivyangApplication']);
    // Bus Concession Scheme Application
    Route::get('amc_bus_concession_application_list/{status}', [App\Http\Controllers\Amc\AmcBusConcessionSchemeController::class, 'busConcessionApplicationList']);
    Route::get('amc_bus_concession_application_view/{id}/{status}', [App\Http\Controllers\Amc\AmcBusConcessionSchemeController::class, 'busConcessionApplicationView']);
    Route::post('bus_concession_application_reject_by_amc/{id}', [App\Http\Controllers\Amc\AmcBusConcessionSchemeController::class, 'rejectBusConcessionApplication']);
    Route::get('bus_concession_application_approve_by_amc/{id}', [App\Http\Controllers\Amc\AmcBusConcessionSchemeController::class, 'approveBusConcessionApplication']);
    // Education Scheme Application
    Route::get('amc_education_scheme_application_list/{status}', [App\Http\Controllers\Amc\AmcEducationSchemeController::class, 'eductationSchemeApplicationList']);
    Route::get('amc_education_scheme_application_view/{id}/{status}', [App\Http\Controllers\Amc\AmcEducationSchemeController::class, 'eductationSchemeApplicationView']);
    Route::post('education_scheme_application_reject_by_amc/{id}', [App\Http\Controllers\Amc\AmcEducationSchemeController::class, 'rejectEductationSchemeApplication']);
    Route::get('education_scheme_application_approve_by_amc/{id}', [App\Http\Controllers\Amc\AmcEducationSchemeController::class, 'approveEducationSchemeApplication']);
    // Marriage Scheme Application
    Route::get('amc_marriage_scheme_application_list/{status}', [App\Http\Controllers\Amc\AmcMarriageSchemeController::class, 'marriageSchemeApplicationList']);
    Route::get('amc_marriage_scheme_application_view/{id}/{status}', [App\Http\Controllers\Amc\AmcMarriageSchemeController::class, 'marriageSchemeApplicationView']);
    Route::post('marriage_scheme_application_reject_by_amc/{id}', [App\Http\Controllers\Amc\AmcMarriageSchemeController::class, 'rejectMarriageSchemeApplication']);
    Route::get('marriage_scheme_application_approve_by_amc/{id}', [App\Http\Controllers\Amc\AmcMarriageSchemeController::class, 'approveMarriageSchemeApplication']);
    // Cancer Scheme Application
    Route::get('amc_cancer_scheme_application_list/{status}', [App\Http\Controllers\Amc\AmcCancerSchemeController::class, 'cancerSchemeApplicationList']);
    Route::get('amc_cancer_scheme_application_view/{id}/{status}', [App\Http\Controllers\Amc\AmcCancerSchemeController::class, 'cancerSchemeApplicationView']);
    Route::post('cancer_scheme_application_reject_by_amc/{id}', [App\Http\Controllers\Amc\AmcCancerSchemeController::class, 'rejectCancerSchemeApplication']);
    Route::get('cancer_scheme_application_approve_by_amc/{id}', [App\Http\Controllers\Amc\AmcCancerSchemeController::class, 'approveCancerSchemeApplication']);
    // Sports Scheme Application
    Route::get('amc_sports_scheme_application_list/{status}', [App\Http\Controllers\Amc\AmcSportsSchemeController::class, 'sportsSchemeApplicationList']);
    Route::get('amc_sports_scheme_application_view/{id}/{status}', [App\Http\Controllers\Amc\AmcSportsSchemeController::class, 'sportsSchemeApplicationView']);
    Route::post('sports_scheme_application_reject_by_amc/{id}', [App\Http\Controllers\Amc\AmcSportsSchemeController::class, 'rejectSportsSchemeApplication']);
    Route::get('sports_scheme_application_approve_by_amc/{id}', [App\Http\Controllers\Amc\AmcSportsSchemeController::class, 'approveSportsSchemeApplication']);
    // Vehicle Scheme Application
    Route::get('amc_vehicle_scheme_application_list/{status}', [App\Http\Controllers\Amc\AmcVehicleSchemeController::class, 'vehicleSchemeApplicationList']);
    Route::get('amc_vehicle_scheme_application_view/{id}/{status}', [App\Http\Controllers\Amc\AmcVehicleSchemeController::class, 'vehicleSchemeApplicationView']);
    Route::post('vehicle_scheme_application_reject_by_amc/{id}', [App\Http\Controllers\Amc\AmcVehicleSchemeController::class, 'rejectVehicleSchemeApplication']);
    Route::get('vehicle_scheme_application_approve_by_amc/{id}', [App\Http\Controllers\Amc\AmcVehicleSchemeController::class, 'approveVehicleSchemeApplication']);
    // Women Sewing/Beautisians Scheme Application
    Route::get('amc_women_scheme_application_list/{status}', [App\Http\Controllers\Amc\AmcWomenSchemeController::class, 'womenSchemeApplicationList']);
    Route::get('amc_women_scheme_application_view/{id}/{status}', [App\Http\Controllers\Amc\AmcWomenSchemeController::class, 'womenSchemeApplicationView']);
    Route::post('women_scheme_application_reject_by_amc/{id}', [App\Http\Controllers\Amc\AmcWomenSchemeController::class, 'rejectWomenSchemeApplication']);
    Route::get('women_scheme_application_approve_by_amc/{id}', [App\Http\Controllers\Amc\AmcWomenSchemeController::class, 'approveWomenSchemeApplication']);


    // DMC Panel
    // Divyang Scheme Application
    Route::get('dmc_divyang_registration_list/{status}', [App\Http\Controllers\Dmc\DmcDivyangSchemeController::class, 'divyangRegistrationList']);
    Route::get('dmc_divyang_registration_view/{id}/{status}', [App\Http\Controllers\Dmc\DmcDivyangSchemeController::class, 'divyangRegistrationView']);
    Route::post('divyang_application_reject_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcDivyangSchemeController::class, 'rejectDivyangApplication']);
    Route::post('divyang_application_approve_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcDivyangSchemeController::class, 'approveDivyangApplication']);
    Route::get('generate_certificate/{id}/{status}', [App\Http\Controllers\Dmc\DmcDivyangSchemeController::class, 'generateCertificate']);
    // Bus Concession Scheme Application
    Route::get('dmc_bus_concession_application_list/{status}', [App\Http\Controllers\Dmc\DmcBusConcessionSchemeController::class, 'busConcessionApplicationList']);
    Route::get('dmc_bus_concession_application_view/{id}/{status}', [App\Http\Controllers\Dmc\DmcBusConcessionSchemeController::class, 'busConcessionApplicationView']);
    Route::post('bus_concession_application_reject_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcBusConcessionSchemeController::class, 'rejectBusConcessionApplication']);
    Route::post('bus_concession_application_approve_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcBusConcessionSchemeController::class, 'approveBusConcessionApplication']);
    Route::get('bus_concession_generate_certificate/{id}/{status}', [App\Http\Controllers\Dmc\DmcBusConcessionSchemeController::class, 'generateCertificate']);
    // Education Scheme Application
    Route::get('dmc_education_scheme_application_list/{status}', [App\Http\Controllers\Dmc\DmcEducationSchemeController::class, 'eductationSchemeApplicationList']);
    Route::get('dmc_education_scheme_application_view/{id}/{status}', [App\Http\Controllers\Dmc\DmcEducationSchemeController::class, 'eductationSchemeApplicationView']);
    Route::post('education_scheme_application_reject_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcEducationSchemeController::class, 'rejectEductationSchemeApplication']);
    Route::post('education_scheme_application_approve_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcEducationSchemeController::class, 'approveEducationSchemeApplication']);
    Route::get('education_scheme_generate_certificate/{id}/{status}', [App\Http\Controllers\Dmc\DmcEducationSchemeController::class, 'generateCertificate']);
    // Marriage Scheme Application
    Route::get('dmc_marriage_scheme_application_list/{status}', [App\Http\Controllers\Dmc\DmcMarriageSchemeController::class, 'marriageSchemeApplicationList']);
    Route::get('dmc_marriage_scheme_application_view/{id}/{status}', [App\Http\Controllers\Dmc\DmcMarriageSchemeController::class, 'marriageSchemeApplicationView']);
    Route::post('marriage_scheme_application_reject_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcMarriageSchemeController::class, 'rejectMarriageSchemeApplication']);
    Route::post('marriage_scheme_application_approve_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcMarriageSchemeController::class, 'approveMarriageSchemeApplication']);
    Route::get('marriage_scheme_generate_certificate/{id}/{status}', [App\Http\Controllers\Dmc\DmcMarriageSchemeController::class, 'generateCertificate']);
    // Cancer Scheme Application
    Route::get('dmc_cancer_scheme_application_list/{status}', [App\Http\Controllers\Dmc\DmcCancerSchemeController::class, 'cancerSchemeApplicationList']);
    Route::get('dmc_cancer_scheme_application_view/{id}/{status}', [App\Http\Controllers\Dmc\DmcCancerSchemeController::class, 'cancerSchemeApplicationView']);
    Route::post('cancer_scheme_application_reject_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcCancerSchemeController::class, 'rejectCancerSchemeApplication']);
    Route::post('cancer_scheme_application_approve_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcCancerSchemeController::class, 'approveCancerSchemeApplication']);
    Route::get('cancer_scheme_generate_certificate/{id}/{status}', [App\Http\Controllers\Dmc\DmcCancerSchemeController::class, 'generateCertificate']);
    // Sports Scheme Application
    Route::get('dmc_sports_scheme_application_list/{status}', [App\Http\Controllers\Dmc\DmcSportsSchemeController::class, 'sportsSchemeApplicationList']);
    Route::get('dmc_sports_scheme_application_view/{id}/{status}', [App\Http\Controllers\Dmc\DmcSportsSchemeController::class, 'sportsSchemeApplicationView']);
    Route::post('sports_scheme_application_reject_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcSportsSchemeController::class, 'rejectSportsSchemeApplication']);
    Route::post('sports_scheme_application_approve_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcSportsSchemeController::class, 'approveSportsSchemeApplication']);
    Route::get('sports_scheme_generate_certificate/{id}/{status}', [App\Http\Controllers\Dmc\DmcSportsSchemeController::class, 'generateCertificate']);
    // Vehicle Scheme Application
    Route::get('dmc_vehicle_scheme_application_list/{status}', [App\Http\Controllers\Dmc\DmcVehicleSchemeController::class, 'vehicleSchemeApplicationList']);
    Route::get('dmc_vehicle_scheme_application_view/{id}/{status}', [App\Http\Controllers\Dmc\DmcVehicleSchemeController::class, 'vehicleSchemeApplicationView']);
    Route::post('vehicle_scheme_application_reject_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcVehicleSchemeController::class, 'rejectVehicleSchemeApplication']);
    Route::post('vehicle_scheme_application_approve_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcVehicleSchemeController::class, 'approveVehicleSchemeApplication']);
    Route::get('vehicle_scheme_generate_certificate/{id}/{status}', [App\Http\Controllers\Dmc\DmcVehicleSchemeController::class, 'generateCertificate']);
    // Women Sewing/Beautisians Scheme Application
    Route::get('dmc_women_scheme_application_list/{status}', [App\Http\Controllers\Dmc\DmcWomenSchemeController::class, 'womenSchemeApplicationList']);
    Route::get('dmc_women_scheme_application_view/{id}/{status}', [App\Http\Controllers\Dmc\DmcWomenSchemeController::class, 'womenSchemeApplicationView']);
    Route::post('women_scheme_application_reject_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcWomenSchemeController::class, 'rejectWomenSchemeApplication']);
    Route::post('women_scheme_application_approve_by_dmc/{id}', [App\Http\Controllers\Dmc\DmcWomenSchemeController::class, 'approveWomenSchemeApplication']);
    Route::get('women_scheme_generate_certificate/{id}/{status}', [App\Http\Controllers\Dmc\DmcWomenSchemeController::class, 'generateCertificate']);


    // Users Roles n Permissions
    Route::resource('users', App\Http\Controllers\Admin\UserController::class );
    Route::get('users/{user}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggle' ])->name('users.toggle');
    Route::get('users/{user}/retire', [App\Http\Controllers\Admin\UserController::class, 'retire' ])->name('users.retire');
    Route::put('users/{user}/change-password', [App\Http\Controllers\Admin\UserController::class, 'changePassword' ])->name('users.change-password');
    Route::get('users/{user}/get-role', [App\Http\Controllers\Admin\UserController::class, 'getRole' ])->name('users.get-role');
    Route::put('users/{user}/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRole' ])->name('users.assign-role');

    //Route::get('users/terms_conditions', [App\Http\Controllers\Admin\UserController::class, 'terms_conditions' ])->name('users.terms_conditions');
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class );



});

Route::get('/php', function(Request $request){
    if( !auth()->check() )
        return 'Unauthorized request';

    Artisan::call($request->artisan);
    return dd(Artisan::output());
});
