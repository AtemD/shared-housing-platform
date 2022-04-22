<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\User\AccountSettingsController;
use App\Http\Controllers\User\CompatibilityQuestionsController;
use App\Http\Controllers\User\AnsweredCompatibilityQuestionsController;
use App\Http\Controllers\User\UnansweredCompatibilityQuestionsController;
use App\Http\Controllers\User\BasicProfileController as UserBasicProfileController;
use App\Http\Controllers\User\PersonalPreferencesController as UserPersonalPreferencesController;
use App\Http\Controllers\User\CompatibilityPreferencesController as UserCompatibilityPreferencesController;
use App\Http\Controllers\User\PlaceListingPreferencesController as UserPlaceListingPreferencesController;
use App\Http\Controllers\User\PlaceListingsController as UserPlaceListingsController;
use App\Http\Controllers\User\PlaceListingLocationsController as UserPlaceListingLocationsController;
use App\Http\Controllers\User\PlaceListingAmenitiesController as UserPlaceListingAmenitiesController;
use App\Http\Controllers\User\InterestsController as UserInterestsController;
use App\Http\Controllers\User\OccupationsController as UserOccupationsController;
use App\Http\Controllers\User\SpokenLanguagesController as UserSpokenLanguagesController;
use App\Http\Controllers\User\UserMatchesController as UserUserMatchesController;
use App\Http\Controllers\User\PlaceListingMatchesController as UserPlaceListingMatchesController;

// Profile Setup Controllers
use App\Http\Controllers\User\ProfileSetup\BasicProfileController as UserBasicProfileProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PersonalPreferencesController as UserPersonalPreferencesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\CompatibilityPreferencesController as UserCompatibilityPreferencesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PlaceListingPreferencesController as UserPlaceListingPreferencesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PlaceListingsController as UserPlaceListingsProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\InterestsController as UserInterestsProfileSetupController;

// Place Listing Setup Controllers
use App\Http\Controllers\User\PlaceListingSetup\PlaceListingsController as UserPlaceListingSetupController;
use App\Http\Controllers\User\PlaceListingSetup\PlaceListingLocationsController as UserPlaceListingLocationSetupController;
use App\Http\Controllers\User\PlaceListingSetup\PlaceListingAmenitiesController as UserPlaceListingAmenitiesSetupController;

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
Route::get('/user/home', [UserHomeController::class, 'index'])
->name('user.home');

Route::get('/user/matches/users', [UserUserMatchesController::class, 'index'])
->name('user.matches.users.index');
Route::get('user/matches/users/{user}', [UserUserMatchesController::class, 'show'])
->name('user.matches.users.show');

Route::get('/user/matches/place-listings', [UserPlaceListingMatchesController::class, 'index'])
->name('user.matches.place-listings.index');
Route::get('/user/matches/place-listings{placeListing}', [UserPlaceListingMatchesController::class, 'show'])
->name('user.matches.place-listings.show');

// admin dashboard home
Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])
->name('admin.home');

// Account setting
// Route::get('/user/dashboard/account-settings', [AccountSettingsController::class, 'index'])
// ->name('user.account-settings.index');

// User Answered Questions
Route::get('/user/dashboard/account-settings/compatibility-questions/unanswered', [UnansweredCompatibilityQuestionsController::class, 'index'])
->name('user.compatibility-questions.unanswered.index');

// User Answered Questions
Route::get('/user/dashboard/account-settings/compatibility-questions/answered', [AnsweredCompatibilityQuestionsController::class, 'index'])
->name('user.compatibility-questions.answered.index');

// User Compatibility Questions
Route::resource('/user/compatibility-questions', CompatibilityQuestionsController::class)
->only(['create', 'store'])
->names(['create' => 'user.compatibility-questions.create','store' => 'user.compatibility-questions.store']);


/**
 * PROFILE SETUP ROUTES
 * 
 */

// User Place Listing Preferences Profile Setup
Route::resource('/user/profile-setup/place-listing-preferences', UserPlaceListingPreferencesProfileSetupController::class)
->only(['create', 'store'])
->names(['create' => 'user.profile-setup.place-listing-preferences.create','store' => 'user.profile-setup.place-listing-preferences.store']);

// User Place Listings Profile Setup
Route::resource('/user/profile-setup/place-listings', UserPlaceListingsProfileSetupController::class)
->only(['create', 'store'])
->names(['create' => 'user.profile-setup.place-listings.create','store' => 'user.profile-setup.place-listings.store']);

// User basic profile Profile Setup
Route::resource('/user/profile-setup/basic-profile', UserBasicProfileProfileSetupController::class)
->only(['create', 'store'])
->names(['create' => 'user.profile-setup.basic-profile.create', 'store' => 'user.profile-setup.basic-profile.store']);

// User personal preferences Profile Setup
Route::resource('/user/profile-setup/personal-preferences', UserPersonalPreferencesProfileSetupController::class)
->only(['create', 'store'])
->names(['create' => 'user.profile-setup.personal-preferences.create', 'store' => 'user.profile-setup.personal-preferences.store']);

// User compatibility preferences Profile Setup
Route::resource('/user/profile-setup/compatibility-preferences', UserCompatibilityPreferencesProfileSetupController::class)
->only(['create', 'store'])
->names(['create' => 'user.profile-setup.compatibility-preferences.create','store' => 'user.profile-setup.compatibility-preferences.store']);

// User Interests Profile Setup
Route::resource('/user/profile-setup/interests', UserInterestsProfileSetupController::class)
->only(['create', 'store'])
->names(['create' => 'user.profile-setup.interests.create','store' => 'user.profile-setup.interests.store']);


/**
 * PLACE LISTING SETUP ROUTES
 * 
 */

// User Interests Profile Setup
Route::resource('/user/place-listing-setup/place-listing', UserPlaceListingSetupController::class)
->only(['create', 'store'])
->names(['create' => 'user.place-listing-setup.place-listings.create','store' => 'user.place-listing-setup.place-listings.store']);
// User place listing location Setup
Route::resource('/user/place-listing-setup/place-listing-location', UserPlaceListingLocationSetupController::class)
->only(['create', 'store'])
->names(['create' => 'user.place-listing-setup.place-listing-locations.create','store' => 'user.place-listing-setup.place-listing-locations.store']);
// User place listing amenities Setup
Route::resource('/user/place-listing-setup/place-listing-amenities', UserPlaceListingAmenitiesSetupController::class)
->only(['create', 'store'])
->names(['create' => 'user.place-listing-setup.place-listing-amenities.create','store' => 'user.place-listing-setup.place-listing-amenities.store']);


/**
 * USER ACCOUNT ROUTES
 * 
 */

// User Compatibility Questions
Route::resource('/user/compatibility-questions', CompatibilityQuestionsController::class)->names([
    'index'     => 'user.compatibility-questions.index',
    'create'    => 'user.compatibility-questions.create',
    'store'     => 'user.compatibility-questions.store',
    'show'      => 'user.compatibility-questions.show',
    'edit'      => 'user.compatibility-questions.edit',
    'store'     => 'user.compatibility-questions.store',
    'update'    => 'user.compatibility-questions.update',
    'destroy'   => 'user.compatibility-questions.destroy'
]);

// User Place Listing Preferences
Route::resource('/user/place-listing-preferences', UserPlaceListingPreferencesController::class)->names([
    'index'     => 'user.place-listing-preferences.index',
    'create'    => 'user.place-listing-preferences.create',
    'store'     => 'user.place-listing-preferences.store',
    'show'      => 'user.place-listing-preferences.show',
    'edit'      => 'user.place-listing-preferences.edit',
    'store'     => 'user.place-listing-preferences.store',
    'update'    => 'user.place-listing-preferences.update',
    'destroy'   => 'user.place-listing-preferences.destroy'
]);

// User Place Listings
Route::resource('/user/place-listings', UserPlaceListingsController::class)->names([
    'index'     => 'user.place-listings.index',
    'create'    => 'user.place-listings.create',
    'store'     => 'user.place-listings.store',
    'show'      => 'user.place-listings.show',
    'edit'      => 'user.place-listings.edit',
    'store'     => 'user.place-listings.store',
    'update'    => 'user.place-listings.update',
    'destroy'   => 'user.place-listings.destroy'
]);

// User Place Listing Location
Route::resource('/user/place-listing-locations', UserPlaceListingLocationsController::class)->names([
    'index'     => 'user.place-listing-locations.index',
    'create'    => 'user.place-listing-locations.create',
    'store'     => 'user.place-listing-locations.store',
    'show'      => 'user.place-listing-locations.show',
    'edit'      => 'user.place-listing-locations.edit',
    'store'     => 'user.place-listing-locations.store',
    'update'    => 'user.place-listing-locations.update',
    'destroy'   => 'user.place-listing-locations.destroy'
]);

Route::get('/user/place-listing/{place_listing}/amenities/edit', [UserPlaceListingAmenitiesController::class, 'edit'])
->name('user.place-listing.amenities.edit');
Route::put('/user/place-listing/{place_listing}/amenities', [UserPlaceListingAmenitiesController::class, 'update'])
->name('user.place-listing.amenities.update');


// User basic profile
Route::resource('/user/basic-profile', UserBasicProfileController::class)->names([
    'index'     => 'user.basic-profile.index',
    'create'    => 'user.basic-profile.create',
    'store'     => 'user.basic-profile.store',
    'show'      => 'user.basic-profile.show',
    'edit'      => 'user.basic-profile.edit',
    'store'     => 'user.basic-profile.store',
    'update'    => 'user.basic-profile.update',
    'destroy'   => 'user.basic-profile.destroy'
]);

// User occupations
Route::resource('/user/occupations', UserOccupationsController::class)->names([
    'index'     => 'user.occupations.index',
    'create'    => 'user.occupations.create',
    'store'     => 'user.occupations.store',
    'show'      => 'user.occupations.show',
    'edit'      => 'user.occupations.edit',
    'store'     => 'user.occupations.store',
    'update'    => 'user.occupations.update',
    'destroy'   => 'user.occupations.destroy'
]);

// User spoken languages
Route::resource('/user/spoken-languages', UserSpokenLanguagesController::class)->names([
    'index'     => 'user.spoken-languages.index',
    'create'    => 'user.spoken-languages.create',
    'store'     => 'user.spoken-languages.store',
    'show'      => 'user.spoken-languages.show',
    'edit'      => 'user.spoken-languages.edit',
    'store'     => 'user.spoken-languages.store',
    'update'    => 'user.spoken-languages.update',
    'destroy'   => 'user.spoken-languages.destroy'
]);

// User personal preferences
Route::resource('/user/personal-preferences', UserPersonalPreferencesController::class)->names([
    'index'     => 'user.personal-preferences.index',
    'create'    => 'user.personal-preferences.create',
    'store'     => 'user.personal-preferences.store',
    'show'      => 'user.personal-preferences.show',
    'edit'      => 'user.personal-preferences.edit',
    'store'     => 'user.personal-preferences.store',
    'update'    => 'user.personal-preferences.update',
    'destroy'   => 'user.personal-preferences.destroy'
]);

// User compatibility preferences
Route::resource('/user/compatibility-preferences', UserCompatibilityPreferencesController::class)->names([
    'index'     => 'user.compatibility-preferences.index',
    'create'    => 'user.compatibility-preferences.create',
    'store'     => 'user.compatibility-preferences.store',
    'show'      => 'user.compatibility-preferences.show',
    'edit'      => 'user.compatibility-preferences.edit',
    'store'     => 'user.compatibility-preferences.store',
    'update'    => 'user.compatibility-preferences.update',
    'destroy'   => 'user.compatibility-preferences.destroy'
]);

// User Interests
Route::resource('/user/interests', UserInterestsController::class)->names([
    'index'     => 'user.interests.index',
    'create'    => 'user.interests.create',
    'store'     => 'user.interests.store',
    'show'      => 'user.interests.show',
    'edit'      => 'user.interests.edit',
    'store'     => 'user.interests.store',
    'update'    => 'user.interests.update',
    'destroy'   => 'user.interests.destroy'
]);
