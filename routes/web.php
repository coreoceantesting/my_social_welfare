<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Masters\DivyangController;

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

    Route::resource('category', CategoryController::class);

    // Route::resource('category', App\Http\Controllers\Admin\Masters\CategoryController::class );

    Route::resource('scheme', App\Http\Controllers\Admin\Masters\SchemeController::class );
    Route::resource('document', App\Http\Controllers\Admin\Masters\DocumentController::class );
    Route::resource('financial', App\Http\Controllers\Admin\Masters\FinancialController::class );
    Route::resource('terms-conditions', App\Http\Controllers\Admin\Masters\TermsAndConditionsController::class );

    // User
    Route::get('terms_conditions/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'terms_conditions'])->name('terms_conditions');
    Route::resource('hayatichaDakhlaform', App\Http\Controllers\Admin\Masters\DivyangController::class);
    Route::get('/hayatichaDakhlaform/pdf-download', 'App\Http\Controllers\Admin\Masters\DivyangController@hayatPdfDownload')->name('hayatichaDakhlaform.pdf-download');

    Route::resource('hayatichaDakhlaform', App\Http\Controllers\Admin\Masters\DivyangController::class);
    Route::put('hayatichaDakhlaform/{id}/upload', [App\Http\Controllers\Admin\Masters\DivyangController::class, 'hayatuploadfile' ])->name('hayatichaDakhlaform.upload');



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