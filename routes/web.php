<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\User\CompatibilityQuestionsController;
use App\Http\Controllers\User\AnsweredCompatibilityQuestionsController;
use App\Http\Controllers\User\UnansweredCompatibilityQuestionsController;
use App\Http\Controllers\User\BasicProfileController as UserBasicProfileController;
use App\Http\Controllers\User\PersonalPreferencesController as UserPersonalPreferencesController;
use App\Http\Controllers\User\CompatibilityPreferencesController as UserCompatibilityPreferencesController;
use App\Http\Controllers\User\PlacePreferencesController as UserPlacePreferencesController;
use App\Http\Controllers\User\PlacesController as UserPlacesController;
use App\Http\Controllers\User\PlaceLocationsController as UserPlaceLocationsController;
use App\Http\Controllers\User\UserLocationsController as UserUserLocationsController;
use App\Http\Controllers\User\PlaceAmenitiesController as UserPlaceAmenitiesController;
use App\Http\Controllers\User\InterestsController as UserInterestsController;
use App\Http\Controllers\User\OccupationsController as UserOccupationsController;
use App\Http\Controllers\User\SpokenLanguagesController as UserSpokenLanguagesController;
use App\Http\Controllers\User\UserMatchesController as UserUserMatchesController;
use App\Http\Controllers\User\PlaceMatchesController as UserPlaceMatchesController;
// use App\Http\Controllers\User\PlacePreferenceLocationsController as UserPlacePreferenceLocationsController;
use App\Http\Controllers\User\PlaceRequestsController as UserPlaceRequestsController;
use App\Http\Controllers\User\SentPlaceRequestsController as UserSentPlaceRequestsController;
use App\Http\Controllers\User\ReceivedPlaceRequestsController as UserReceivedPlaceRequestsController;

// Profile Setup Controllers
use App\Http\Controllers\User\ProfileSetup\BasicProfileController as UserBasicProfileProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PersonalPreferencesController as UserPersonalPreferencesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\CompatibilityPreferencesController as UserCompatibilityPreferencesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PlacePreferencesController as UserPlacePreferencesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PlacesController as UserPlacesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\InterestsController as UserInterestsProfileSetupController;

// Place  Setup Controllers
use App\Http\Controllers\User\PlaceSetup\PlacesController as UserPlaceSetupController;
use App\Http\Controllers\User\PlaceSetup\PlaceLocationsController as UserPlaceLocationSetupController;
use App\Http\Controllers\User\PlaceSetup\PlaceAmenitiesController as UserPlaceAmenitiesSetupController;

// Admin Controllers
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\PlacesController as AdminPlacesController;

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

Route::get('/user/matches/places', [UserPlaceMatchesController::class, 'index'])
    ->name('user.matches.places.index');
Route::get('/user/matches/places/{place}', [UserPlaceMatchesController::class, 'show'])
    ->name('user.matches.places.show');

// admin dashboard home
Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])
    ->name('admin.home');

// Admin Users
Route::get('/admin/users', [AdminUsersController::class, 'index'])
    ->name('admin.users.index');
Route::post('/admin/users', [AdminUsersController::class, 'store'])
    ->name('admin.users.store');
Route::get('/admin/users/{user}/edit', [AdminUsersController::class, 'edit'])
    ->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminUsersController::class, 'update'])
    ->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminUsersController::class, 'destroy'])
    ->name('admin.users.destroy');

// Admin places
Route::get('/admin/places', [AdminPlacesController::class, 'index'])
    ->name('admin.places.index');
Route::post('/admin/places', [AdminPlacesController::class, 'store'])
    ->name('admin.places.store');
Route::get('/admin/places/{place}/edit', [AdminPlacesController::class, 'edit'])
    ->name('admin.places.edit');
Route::put('/admin/places/{place}', [AdminPlacesController::class, 'update'])
    ->name('admin.places.update');
Route::delete('/admin/places/{place}', [AdminPlacesController::class, 'destroy'])
    ->name('admin.places.destroy');

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
    ->names(['create' => 'user.compatibility-questions.create', 'store' => 'user.compatibility-questions.store']);


/**
 * PROFILE SETUP ROUTES
 * 
 */

// User Place  Preferences Profile Setup
Route::resource('/user/profile-setup/place-preferences', UserPlacePreferencesProfileSetupController::class)
    ->only(['create', 'store'])
    ->names(['create' => 'user.profile-setup.place-preferences.create', 'store' => 'user.profile-setup.place-preferences.store']);

// User Place s Profile Setup
Route::resource('/user/profile-setup/places', UserPlacesProfileSetupController::class)
    ->only(['create', 'store'])
    ->names(['create' => 'user.profile-setup.places.create', 'store' => 'user.profile-setup.places.store']);

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
    ->names(['create' => 'user.profile-setup.compatibility-preferences.create', 'store' => 'user.profile-setup.compatibility-preferences.store']);

// User Interests Profile Setup
Route::resource('/user/profile-setup/interests', UserInterestsProfileSetupController::class)
    ->only(['create', 'store'])
    ->names(['create' => 'user.profile-setup.interests.create', 'store' => 'user.profile-setup.interests.store']);


/**
 * PLACE  SETUP ROUTES
 * 
 */

// User Interests Profile Setup
Route::resource('/user/place-setup/place', UserPlaceSetupController::class)
    ->only(['create', 'store'])
    ->names(['create' => 'user.place-setup.places.create', 'store' => 'user.place-setup.places.store']);
// User place  location Setup
Route::resource('/user/place-setup/place-location', UserPlaceLocationSetupController::class)
    ->only(['create', 'store'])
    ->names(['create' => 'user.place-setup.place-locations.create', 'store' => 'user.place-setup.place-locations.store']);
// User place  amenities Setup
Route::resource('/user/place-setup/place-amenities', UserPlaceAmenitiesSetupController::class)
    ->only(['create', 'store'])
    ->names(['create' => 'user.place-setup.place-amenities.create', 'store' => 'user.place-setup.place-amenities.store']);


/**
 * USER ACCOUNT ROUTES
 * 
 */

// User Answered Questions
Route::get('/user/place-requests/sent', [UserSentPlaceRequestsController::class, 'index'])
    ->name('user.place-requests.sent.index');
Route::get('/user/place-requests/received', [UserReceivedPlaceRequestsController::class, 'index'])
    ->name('user.place-requests.received.index');

// User Place Requests
Route::resource('/user/place-requests', UserPlaceRequestsController::class)->names([
    'index'     => 'user.place-requests.index',
    'create'    => 'user.place-requests.create',
    'store'     => 'user.place-requests.store',
    'show'      => 'user.place-requests.show',
    'edit'      => 'user.place-requests.edit',
    'store'     => 'user.place-requests.store',
    'update'    => 'user.place-requests.update',
    'destroy'   => 'user.place-requests.destroy'
]);

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

// User Place  Preferences
Route::resource('/user/place-preferences', UserPlacePreferencesController::class)->names([
    'index'     => 'user.place-preferences.index',
    'create'    => 'user.place-preferences.create',
    'store'     => 'user.place-preferences.store',
    'show'      => 'user.place-preferences.show',
    'edit'      => 'user.place-preferences.edit',
    'store'     => 'user.place-preferences.store',
    'update'    => 'user.place-preferences.update',
    'destroy'   => 'user.place-preferences.destroy'
]);

// User Place  Preferences
// Route::resource('/user/place-preference-locations', UserPlacePreferenceLocationsController::class)->names([
//     'index'     => 'user.place-preference-locations.index',
//     'create'    => 'user.place-preference-locations.create',
//     'store'     => 'user.place-preference-locations.store',
//     'show'      => 'user.place-preference-locations.show',
//     'edit'      => 'user.place-preference-locations.edit',
//     'store'     => 'user.place-preference-locations.store',
//     'update'    => 'user.place-preference-locations.update',
//     'destroy'   => 'user.place-preference-locations.destroy'
// ]);

// User Place s
Route::resource('/user/places', UserPlacesController::class)->names([
    'index'     => 'user.places.index',
    'create'    => 'user.places.create',
    'store'     => 'user.places.store',
    'show'      => 'user.places.show',
    'edit'      => 'user.places.edit',
    'store'     => 'user.places.store',
    'update'    => 'user.places.update',
    'destroy'   => 'user.places.destroy'
]);

// User Place  Location
Route::resource('/user/place-locations', UserPlaceLocationsController::class)->names([
    'index'     => 'user.place-locations.index',
    'create'    => 'user.place-locations.create',
    'store'     => 'user.place-locations.store',
    'show'      => 'user.place-locations.show',
    'edit'      => 'user.place-locations.edit',
    'store'     => 'user.place-locations.store',
    'update'    => 'user.place-locations.update',
    'destroy'   => 'user.place-locations.destroy'
]);

// User Location
Route::resource('/user/user-locations', UserUserLocationsController::class)->names([
    'index'     => 'user.user-locations.index',
    'create'    => 'user.user-locations.create',
    'store'     => 'user.user-locations.store',
    'show'      => 'user.user-locations.show',
    'edit'      => 'user.user-locations.edit',
    'store'     => 'user.user-locations.store',
    'update'    => 'user.user-locations.update',
    'destroy'   => 'user.user-locations.destroy'
]);

// User place amenities
Route::get('/user/place/{place}/amenities/edit', [UserPlaceAmenitiesController::class, 'edit'])
    ->name('user.place.amenities.edit');
Route::put('/user/place/{place}/amenities', [UserPlaceAmenitiesController::class, 'update'])
    ->name('user.place.amenities.update');


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
