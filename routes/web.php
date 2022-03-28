<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\User\ProfileSetup\BasicProfileController as BasicProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PersonalPreferencesController as PersonalPreferencesSetupController;
use App\Http\Controllers\User\ProfileSetup\CompatibilityPreferencesController as CompatibilityPreferencesSetupController;
use App\Http\Controllers\User\ProfileSetup\PlaceListingPreferencesController as PlaceListingPreferencesSetupController;
use App\Http\Controllers\User\ProfileSetup\PlaceListingsController as PlaceListingsSetupController;
use App\Http\Controllers\User\ProfileSetup\InterestsController as InterestsSetupController;

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
    return view('welcome');
})->name('welcome');

// Note: Login and register auth routes in FortifyServiceProvider.php

// user dashboard home
Route::get('/user/dashboard/', [UserHomeController::class, 'index'])
->name('user.home');

// admin dashboard home
Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])
->name('admin.home');

Route::get('/user/dashboard/profile-setup/place-listing-preferences/create', [PlaceListingPreferencesSetupController::class, 'create'])
->name('user.profile-setup.place-listing-preferences.create');
Route::post('/user/dashboard/profile-setup/place-listing-preferences/store', [PlaceListingPreferencesSetupController::class, 'store'])
->name('user.profile-setup.place-listing-preferences.store');

Route::get('/user/dashboard/profile-setup/place-listings/create', [PlaceListingsSetupController::class, 'create'])
->name('user.profile-setup.place-listings.create');
Route::post('/user/dashboard/profile-setup/places-listings/store', [PlaceListingsSetupController::class, 'store'])
->name('user.profile-setup.place-listings.store');

// Basic profile
// Route::get('/user/dashboard/account/basic-profile/create', [BasicProfileController::class, 'create'])
// ->name('user.basic-profile.create');
// Route::post('/user/dashboard/account/basic-profile', [BasicProfileController::class, 'store'])
// ->name('user.basic-profile.store');
// Route::get('/user/dashboard/account/basic-profile/{user}/edit', [BasicProfileController::class, 'edit'])
// ->name('user.basic-profile.edit');
// Route::put('/user/dashboard/account/basic-profile/{user}', [BasicProfileController::class, 'update'])
// ->name('user.basic-profile.update');
// Route::delete('/user/dashboard/account/basic-profile/{user}', [BasicProfileController::class, 'destroy'])
// ->name('user.basic-profile.destroy');


// Profile Setup Routes
Route::get('/user/dashboard/profile-setup/basic-profile/create', [BasicProfileSetupController::class, 'create'])
->name('user.profile-setup.basic-profile.create');
Route::post('/user/dashboard/profile-setup/basic-profile', [BasicProfileSetupController::class, 'store'])
->name('user.profile-setup.basic-profile.store');

Route::get('/user/dashboard/profile-setup/personal-preferences/create', [PersonalPreferencesSetupController::class, 'create'])
->name('user.profile-setup.personal-preferences.create');
Route::post('/user/dashboard/profile-setup/personal-preferences/store', [PersonalPreferencesSetupController::class, 'store'])
->name('user.profile-setup.personal-preferences.store');

Route::get('/user/dashboard/profile-setup/compatibility-preferences/create', [CompatibilityPreferencesSetupController::class, 'create'])
->name('user.profile-setup.compatibility-preferences.create');
Route::post('/user/dashboard/profile-setup/compatibility-preferences/store', [CompatibilityPreferencesSetupController::class, 'store'])
->name('user.profile-setup.compatibility-preferences.store');

Route::get('/user/dashboard/profile-setup/interests/create', [InterestsSetupController::class, 'create'])
->name('user.profile-setup.interests.create');
Route::post('/user/dashboard/profile-setup/interests/store', [InterestsSetupController::class, 'store'])
->name('user.profile-setup.interests.store');
