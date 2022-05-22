<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\User\HomeController as UserHomeController;
// use App\Http\Controllers\Admin\HomeController as AdminHomeController;
// use App\Http\Controllers\User\CompatibilityQuestionsController;
// use App\Http\Controllers\User\AnsweredCompatibilityQuestionsController;
// use App\Http\Controllers\User\UnansweredCompatibilityQuestionsController;
// use App\Http\Controllers\User\BasicProfileController as UserBasicProfileController;
// use App\Http\Controllers\User\PersonalPreferencesController as UserPersonalPreferencesController;
// use App\Http\Controllers\User\CompatibilityPreferencesController as UserCompatibilityPreferencesController;
// use App\Http\Controllers\User\PlacePreferencesController as UserPlacePreferencesController;
// use App\Http\Controllers\User\PlacesController as UserPlacesController;
// use App\Http\Controllers\User\PlaceLocationsController as UserPlaceLocationsController;
// use App\Http\Controllers\User\UserLocationsController as UserUserLocationsController;
// use App\Http\Controllers\User\PlaceAmenitiesController as UserPlaceAmenitiesController;
// use App\Http\Controllers\User\InterestsController as UserInterestsController;
// use App\Http\Controllers\User\OccupationsController as UserOccupationsController;
// use App\Http\Controllers\User\SpokenLanguagesController as UserSpokenLanguagesController;
// use App\Http\Controllers\User\UserMatchesController as UserUserMatchesController;
// use App\Http\Controllers\User\PlaceMatchesController as UserPlaceMatchesController;
// use App\Http\Controllers\User\PlacePreferenceLocationsController as UserPlacePreferenceLocationsController;
// use App\Http\Controllers\User\PlaceRequestsController as UserPlaceRequestsController;
// use App\Http\Controllers\User\SentPlaceRequestsController as UserSentPlaceRequestsController;
// use App\Http\Controllers\User\ReceivedPlaceRequestsController as UserReceivedPlaceRequestsController;

// Lister controllers
use App\Http\Controllers\Lister\HomeController as ListerHomeController;
use App\Http\Controllers\Lister\CompatibilityQuestionsController as ListerCompatibilityQuestionsController;
use App\Http\Controllers\Lister\AnsweredCompatibilityQuestionsController as ListerAnsweredCompatibilityQuestionsController;
use App\Http\Controllers\Lister\UnansweredCompatibilityQuestionsController as ListerUnansweredCompatibilityQuestionsController;
use App\Http\Controllers\Lister\BasicProfileController as ListerBasicProfileController;
use App\Http\Controllers\Lister\PersonalPreferencesController as ListerPersonalPreferencesController;
use App\Http\Controllers\Lister\CompatibilityPreferencesController as ListerCompatibilityPreferencesController;
use App\Http\Controllers\Lister\PlacesController as ListerPlacesController;
use App\Http\Controllers\Lister\PlaceLocationsController as ListerPlaceLocationsController;
use App\Http\Controllers\Lister\UserLocationsController as ListerUserLocationsController;
use App\Http\Controllers\Lister\PlaceAmenitiesController as ListerPlaceAmenitiesController;
use App\Http\Controllers\Lister\InterestsController as ListerInterestsController;
use App\Http\Controllers\Lister\OccupationsController as ListerOccupationsController;
use App\Http\Controllers\Lister\SpokenLanguagesController as ListerSpokenLanguagesController;
use App\Http\Controllers\Lister\UserMatchesController as ListerUserMatchesController;
use App\Http\Controllers\Lister\PlaceRequestsController as ListerPlaceRequestsController;
use App\Http\Controllers\Lister\SentPlaceRequestsController as ListerSentPlaceRequestsController;
use App\Http\Controllers\Lister\ReceivedPlaceRequestsController as ListerReceivedPlaceRequestsController;
// Place  Setup Controllers
use App\Http\Controllers\Lister\PlaceSetup\PlacesController as ListerPlaceSetupController;
use App\Http\Controllers\Lister\PlaceSetup\PlaceLocationsController as ListerPlaceLocationSetupController;
use App\Http\Controllers\Lister\PlaceSetup\PlaceAmenitiesController as ListerPlaceAmenitiesSetupController;

// Searcher controllers
use App\Http\Controllers\Searcher\HomeController as SearcherHomeController;
use App\Http\Controllers\Searcher\CompatibilityQuestionsController as SearcherCompatibilityQuestionsController;
use App\Http\Controllers\Searcher\AnsweredCompatibilityQuestionsController as SearcherAnsweredCompatibilityQuestionsController;
use App\Http\Controllers\Searcher\UnansweredCompatibilityQuestionsController as SearcherUnansweredCompatibilityQuestionsController;
use App\Http\Controllers\Searcher\BasicProfileController as SearcherBasicProfileController;
use App\Http\Controllers\Searcher\PersonalPreferencesController as SearcherPersonalPreferencesController;
use App\Http\Controllers\Searcher\CompatibilityPreferencesController as SearcherCompatibilityPreferencesController;
// use App\Http\Controllers\Searcher\PlacesController as SearcherPlacesController;
use App\Http\Controllers\Searcher\PlaceLocationsController as SearcherPlaceLocationsController;
use App\Http\Controllers\Searcher\PlacePreferencesController as SearcherPlacePreferencesController;
use App\Http\Controllers\Searcher\PreferredLocationsController as SearcherPreferredLocationsController;
use App\Http\Controllers\Searcher\UserLocationsController as SearcherUserLocationsController;
use App\Http\Controllers\Searcher\PlaceAmenitiesController as SearcherPlaceAmenitiesController;
use App\Http\Controllers\Searcher\InterestsController as SearcherInterestsController;
use App\Http\Controllers\Searcher\OccupationsController as SearcherOccupationsController;
use App\Http\Controllers\Searcher\SpokenLanguagesController as SearcherSpokenLanguagesController;
use App\Http\Controllers\Searcher\UserMatchesController as SearcherUserMatchesController;
use App\Http\Controllers\Searcher\PlaceMatchesController as SearcherPlaceMatchesController;
use App\Http\Controllers\Searcher\PlaceRequestsController as SearcherPlaceRequestsController;
use App\Http\Controllers\Searcher\SentPlaceRequestsController as SearcherSentPlaceRequestsController;
use App\Http\Controllers\Searcher\ReceivedPlaceRequestsController as SearcherReceivedPlaceRequestsController;

// Profile Setup Controllers
use App\Http\Controllers\User\ProfileSetup\BasicProfileController as UserBasicProfileProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PersonalPreferencesController as UserPersonalPreferencesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\CompatibilityPreferencesController as UserCompatibilityPreferencesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PlacePreferencesController as UserPlacePreferencesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\PlacesController as UserPlacesProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\InterestsController as UserInterestsProfileSetupController;
use App\Http\Controllers\User\ProfileSetup\UserLocationsController as UserUserLocationProfileSetupController;

// Place Setup Controllers
// use App\Http\Controllers\User\PlaceSetup\PlacesController as UserPlaceSetupController;
// use App\Http\Controllers\User\PlaceSetup\PlaceLocationsController as UserPlaceLocationSetupController;
// use App\Http\Controllers\User\PlaceSetup\PlaceAmenitiesController as UserPlaceAmenitiesSetupController;

// Admin Controllers
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\PlacesController as AdminPlacesController;
use App\Http\Controllers\Admin\CompatibilityQuestionsController as AdminCompatibilityQuestionsController;

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
// Route::get('/user/home', [UserHomeController::class, 'index'])
//     ->name('user.home');

// Route::get('/user/matches/users', [UserUserMatchesController::class, 'index'])
//     ->name('user.matches.users.index');
// Route::get('user/matches/users/{user}', [UserUserMatchesController::class, 'show'])
//     ->name('user.matches.users.show');

// Route::get('/user/matches/places', [UserPlaceMatchesController::class, 'index'])
//     ->name('user.matches.places.index');
// Route::get('/user/matches/places/{place}', [UserPlaceMatchesController::class, 'show'])
//     ->name('user.matches.places.show');

// Route::prefix('lister')->group(function () {
//     //
// });

Route::prefix('searcher')->group(function () {

    // user dashboard home
    Route::get('home', [SearcherHomeController::class, 'index'])
        ->name('searcher.home');

    Route::get('matches/users', [SearcherUserMatchesController::class, 'index'])
        ->name('searcher.matches.users.index');
    Route::get('matches/users/{user}', [SearcherUserMatchesController::class, 'show'])
        ->name('searcher.matches.users.show');

    Route::get('matches/places', [SearcherPlaceMatchesController::class, 'index'])
        ->name('searcher.matches.places.index');
    Route::get('matches/places/{place}', [SearcherPlaceMatchesController::class, 'show'])
        ->name('searcher.matches.places.show');

    // User Answered Questions
    Route::get('place-requests/sent', [SearcherSentPlaceRequestsController::class, 'index'])
        ->name('searcher.place-requests.sent.index');
    Route::get('place-requests/received', [SearcherReceivedPlaceRequestsController::class, 'index'])
        ->name('searcher.place-requests.received.index');

    // User Place Requests
    Route::resource('place-requests', SearcherPlaceRequestsController::class)->names([
        'index'     => 'searcher.place-requests.index',
        'create'    => 'searcher.place-requests.create',
        'store'     => 'searcher.place-requests.store',
        'show'      => 'searcher.place-requests.show',
        'edit'      => 'searcher.place-requests.edit',
        'store'     => 'searcher.place-requests.store',
        'update'    => 'searcher.place-requests.update',
        'destroy'   => 'searcher.place-requests.destroy'
    ]);

    // User Compatibility Questions
    Route::resource('compatibility-questions', SearcherCompatibilityQuestionsController::class)->names([
        'index'     => 'searcher.compatibility-questions.index',
        'create'    => 'searcher.compatibility-questions.create',
        'store'     => 'searcher.compatibility-questions.store',
        'show'      => 'searcher.compatibility-questions.show',
        'edit'      => 'searcher.compatibility-questions.edit',
        'store'     => 'searcher.compatibility-questions.store',
        'update'    => 'searcher.compatibility-questions.update',
        'destroy'   => 'searcher.compatibility-questions.destroy'
    ]);

    // User Place s
    // Route::resource('places', SearcherPlacesController::class)->names([
    //     'index'     => 'searcher.places.index',
    //     'create'    => 'searcher.places.create',
    //     'store'     => 'searcher.places.store',
    //     'show'      => 'searcher.places.show',
    //     'edit'      => 'searcher.places.edit',
    //     'store'     => 'searcher.places.store',
    //     'update'    => 'searcher.places.update',
    //     'destroy'   => 'searcher.places.destroy'
    // ]);

    Route::resource('place-preferences', SearcherPlacePreferencesController::class)->names([
        'index'     => 'searcher.place-preferences.index',
        'create'    => 'searcher.place-preferences.create',
        'store'     => 'searcher.place-preferences.store',
        'show'      => 'searcher.place-preferences.show',
        'edit'      => 'searcher.place-preferences.edit',
        'store'     => 'searcher.place-preferences.store',
        'update'    => 'searcher.place-preferences.update',
        'destroy'   => 'searcher.place-preferences.destroy'
    ]);

    Route::resource('preferred-locations', SearcherPreferredLocationsController::class)->names([
        'index'     => 'searcher.preferred-locations.index',
        'create'    => 'searcher.preferred-locations.create',
        'store'     => 'searcher.preferred-locations.store',
        'show'      => 'searcher.preferred-locations.show',
        'edit'      => 'searcher.preferred-locations.edit',
        'store'     => 'searcher.preferred-locations.store',
        'update'    => 'searcher.preferred-locations.update',
        'destroy'   => 'searcher.preferred-locations.destroy'
    ]);

    // User Place  Location
    Route::resource('place-locations', SearcherPlaceLocationsController::class)->names([
        'index'     => 'searcher.place-locations.index',
        'create'    => 'searcher.place-locations.create',
        'store'     => 'searcher.place-locations.store',
        'show'      => 'searcher.place-locations.show',
        'edit'      => 'searcher.place-locations.edit',
        'store'     => 'searcher.place-locations.store',
        'update'    => 'searcher.place-locations.update',
        'destroy'   => 'searcher.place-locations.destroy'
    ]);

    // User Location
    Route::resource('user-locations', SearcherUserLocationsController::class)->names([
        'index'     => 'searcher.user-locations.index',
        'create'    => 'searcher.user-locations.create',
        'store'     => 'searcher.user-locations.store',
        'show'      => 'searcher.user-locations.show',
        'edit'      => 'searcher.user-locations.edit',
        'store'     => 'searcher.user-locations.store',
        'update'    => 'searcher.user-locations.update',
        'destroy'   => 'searcher.user-locations.destroy'
    ]);

    // User place amenities
    Route::get('place/{place}/amenities/edit', [SearcherPlaceAmenitiesController::class, 'edit'])
        ->name('searcher.place.amenities.edit');
    Route::put('place/{place}/amenities', [SearcherPlaceAmenitiesController::class, 'update'])
        ->name('searcher.place.amenities.update');


    // User basic profile
    Route::resource('basic-profile', SearcherBasicProfileController::class)->names([
        'index'     => 'searcher.basic-profile.index',
        'create'    => 'searcher.basic-profile.create',
        'store'     => 'searcher.basic-profile.store',
        'show'      => 'searcher.basic-profile.show',
        'edit'      => 'searcher.basic-profile.edit',
        'store'     => 'searcher.basic-profile.store',
        'update'    => 'searcher.basic-profile.update',
        'destroy'   => 'searcher.basic-profile.destroy'
    ]);

    // User occupations
    Route::resource('occupations', SearcherOccupationsController::class)->names([
        'index'     => 'searcher.occupations.index',
        'create'    => 'searcher.occupations.create',
        'store'     => 'searcher.occupations.store',
        'show'      => 'searcher.occupations.show',
        'edit'      => 'searcher.occupations.edit',
        'store'     => 'searcher.occupations.store',
        'update'    => 'searcher.occupations.update',
        'destroy'   => 'searcher.occupations.destroy'
    ]);

    // User spoken languages
    Route::resource('spoken-languages', SearcherSpokenLanguagesController::class)->names([
        'index'     => 'searcher.spoken-languages.index',
        'create'    => 'searcher.spoken-languages.create',
        'store'     => 'searcher.spoken-languages.store',
        'show'      => 'searcher.spoken-languages.show',
        'edit'      => 'searcher.spoken-languages.edit',
        'store'     => 'searcher.spoken-languages.store',
        'update'    => 'searcher.spoken-languages.update',
        'destroy'   => 'searcher.spoken-languages.destroy'
    ]);

    // User personal preferences
    Route::resource('personal-preferences', SearcherPersonalPreferencesController::class)->names([
        'index'     => 'searcher.personal-preferences.index',
        'create'    => 'searcher.personal-preferences.create',
        'store'     => 'searcher.personal-preferences.store',
        'show'      => 'searcher.personal-preferences.show',
        'edit'      => 'searcher.personal-preferences.edit',
        'store'     => 'searcher.personal-preferences.store',
        'update'    => 'searcher.personal-preferences.update',
        'destroy'   => 'searcher.personal-preferences.destroy'
    ]);

    // User compatibility preferences
    Route::resource('compatibility-preferences', SearcherCompatibilityPreferencesController::class)->names([
        'index'     => 'searcher.compatibility-preferences.index',
        'create'    => 'searcher.compatibility-preferences.create',
        'store'     => 'searcher.compatibility-preferences.store',
        'show'      => 'searcher.compatibility-preferences.show',
        'edit'      => 'searcher.compatibility-preferences.edit',
        'store'     => 'searcher.compatibility-preferences.store',
        'update'    => 'searcher.compatibility-preferences.update',
        'destroy'   => 'searcher.compatibility-preferences.destroy'
    ]);

    // User Interests
    Route::resource('interests', SearcherInterestsController::class)->names([
        'index'     => 'searcher.interests.index',
        'create'    => 'searcher.interests.create',
        'store'     => 'searcher.interests.store',
        'show'      => 'searcher.interests.show',
        'edit'      => 'searcher.interests.edit',
        'store'     => 'searcher.interests.store',
        'update'    => 'searcher.interests.update',
        'destroy'   => 'searcher.interests.destroy'
    ]);

    // User Answered Questions
    Route::get('account-settings/compatibility-questions/unanswered', [SearcherUnansweredCompatibilityQuestionsController::class, 'index'])
        ->name('searcher.compatibility-questions.unanswered.index');

    // User Answered Questions
    Route::get('account-settings/compatibility-questions/answered', [SearcherAnsweredCompatibilityQuestionsController::class, 'index'])
        ->name('searcher.compatibility-questions.answered.index');

    // User Compatibility Questions
    Route::resource('compatibility-questions', SearcherCompatibilityQuestionsController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'searcher.compatibility-questions.create', 'store' => 'searcher.compatibility-questions.store']);
});

Route::prefix('lister')->group(function () {

    // user dashboard home
    Route::get('home', [ListerHomeController::class, 'index'])
        ->name('lister.home');

    Route::get('matches/users', [ListerUserMatchesController::class, 'index'])
        ->name('lister.matches.users.index');
    Route::get('matches/users/{user}', [ListerUserMatchesController::class, 'show'])
        ->name('lister.matches.users.show');

    // User Answered Questions
    Route::get('place-requests/sent', [ListerSentPlaceRequestsController::class, 'index'])
        ->name('lister.place-requests.sent.index');
    Route::get('place-requests/received', [ListerReceivedPlaceRequestsController::class, 'index'])
        ->name('lister.place-requests.received.index');

    // User Place Requests
    Route::resource('place-requests', ListerPlaceRequestsController::class)->names([
        'index'     => 'lister.place-requests.index',
        'create'    => 'lister.place-requests.create',
        'store'     => 'lister.place-requests.store',
        'show'      => 'lister.place-requests.show',
        'edit'      => 'lister.place-requests.edit',
        'store'     => 'lister.place-requests.store',
        'update'    => 'lister.place-requests.update',
        'destroy'   => 'lister.place-requests.destroy'
    ]);

    // User Compatibility Questions
    Route::resource('compatibility-questions', ListerCompatibilityQuestionsController::class)->names([
        'index'     => 'lister.compatibility-questions.index',
        'create'    => 'lister.compatibility-questions.create',
        'store'     => 'lister.compatibility-questions.store',
        'show'      => 'lister.compatibility-questions.show',
        'edit'      => 'lister.compatibility-questions.edit',
        'store'     => 'lister.compatibility-questions.store',
        'update'    => 'lister.compatibility-questions.update',
        'destroy'   => 'lister.compatibility-questions.destroy'
    ]);

    // User Place s
    Route::resource('places', ListerPlacesController::class)->names([
        'index'     => 'lister.places.index',
        'create'    => 'lister.places.create',
        'store'     => 'lister.places.store',
        'show'      => 'lister.places.show',
        'edit'      => 'lister.places.edit',
        'store'     => 'lister.places.store',
        'update'    => 'lister.places.update',
        'destroy'   => 'lister.places.destroy'
    ]);

    // User Place  Location
    Route::resource('place-locations', ListerPlaceLocationsController::class)->names([
        'index'     => 'lister.place-locations.index',
        'create'    => 'lister.place-locations.create',
        'store'     => 'lister.place-locations.store',
        'show'      => 'lister.place-locations.show',
        'edit'      => 'lister.place-locations.edit',
        'store'     => 'lister.place-locations.store',
        'update'    => 'lister.place-locations.update',
        'destroy'   => 'lister.place-locations.destroy'
    ]);

    // User Location
    Route::resource('user-locations', ListerUserLocationsController::class)->names([
        'index'     => 'lister.user-locations.index',
        'create'    => 'lister.user-locations.create',
        'store'     => 'lister.user-locations.store',
        'show'      => 'lister.user-locations.show',
        'edit'      => 'lister.user-locations.edit',
        'store'     => 'lister.user-locations.store',
        'update'    => 'lister.user-locations.update',
        'destroy'   => 'lister.user-locations.destroy'
    ]);

    // User place amenities
    Route::get('place/{place}/amenities/edit', [ListerPlaceAmenitiesController::class, 'edit'])
        ->name('lister.place.amenities.edit');
    Route::put('place/{place}/amenities', [ListerPlaceAmenitiesController::class, 'update'])
        ->name('lister.place.amenities.update');


    // User basic profile
    Route::resource('basic-profile', ListerBasicProfileController::class)->names([
        'index'     => 'lister.basic-profile.index',
        'create'    => 'lister.basic-profile.create',
        'store'     => 'lister.basic-profile.store',
        'show'      => 'lister.basic-profile.show',
        'edit'      => 'lister.basic-profile.edit',
        'store'     => 'lister.basic-profile.store',
        'update'    => 'lister.basic-profile.update',
        'destroy'   => 'lister.basic-profile.destroy'
    ]);

    // User occupations
    Route::resource('occupations', ListerOccupationsController::class)->names([
        'index'     => 'lister.occupations.index',
        'create'    => 'lister.occupations.create',
        'store'     => 'lister.occupations.store',
        'show'      => 'lister.occupations.show',
        'edit'      => 'lister.occupations.edit',
        'store'     => 'lister.occupations.store',
        'update'    => 'lister.occupations.update',
        'destroy'   => 'lister.occupations.destroy'
    ]);

    // User spoken languages
    Route::resource('spoken-languages', ListerSpokenLanguagesController::class)->names([
        'index'     => 'lister.spoken-languages.index',
        'create'    => 'lister.spoken-languages.create',
        'store'     => 'lister.spoken-languages.store',
        'show'      => 'lister.spoken-languages.show',
        'edit'      => 'lister.spoken-languages.edit',
        'store'     => 'lister.spoken-languages.store',
        'update'    => 'lister.spoken-languages.update',
        'destroy'   => 'lister.spoken-languages.destroy'
    ]);

    // User personal preferences
    Route::resource('personal-preferences', ListerPersonalPreferencesController::class)->names([
        'index'     => 'lister.personal-preferences.index',
        'create'    => 'lister.personal-preferences.create',
        'store'     => 'lister.personal-preferences.store',
        'show'      => 'lister.personal-preferences.show',
        'edit'      => 'lister.personal-preferences.edit',
        'store'     => 'lister.personal-preferences.store',
        'update'    => 'lister.personal-preferences.update',
        'destroy'   => 'lister.personal-preferences.destroy'
    ]);

    // User compatibility preferences
    Route::resource('compatibility-preferences', ListerCompatibilityPreferencesController::class)->names([
        'index'     => 'lister.compatibility-preferences.index',
        'create'    => 'lister.compatibility-preferences.create',
        'store'     => 'lister.compatibility-preferences.store',
        'show'      => 'lister.compatibility-preferences.show',
        'edit'      => 'lister.compatibility-preferences.edit',
        'store'     => 'lister.compatibility-preferences.store',
        'update'    => 'lister.compatibility-preferences.update',
        'destroy'   => 'lister.compatibility-preferences.destroy'
    ]);

    // User Interests
    Route::resource('interests', ListerInterestsController::class)->names([
        'index'     => 'lister.interests.index',
        'create'    => 'lister.interests.create',
        'store'     => 'lister.interests.store',
        'show'      => 'lister.interests.show',
        'edit'      => 'lister.interests.edit',
        'store'     => 'lister.interests.store',
        'update'    => 'lister.interests.update',
        'destroy'   => 'lister.interests.destroy'
    ]);

    /**
     * PLACE  SETUP ROUTES
     * 
     */

    // User Interests Profile Setup
    Route::resource('place-setup/place', ListerPlaceSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'lister.place-setup.places.create', 'store' => 'lister.place-setup.places.store']);
    // User place  location Setup
    Route::resource('place-setup/place-location', ListerPlaceLocationSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'lister.place-setup.place-locations.create', 'store' => 'lister.place-setup.place-locations.store']);
    // User place  amenities Setup
    Route::resource('place-setup/place-amenities', ListerPlaceAmenitiesSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'lister.place-setup.place-amenities.create', 'store' => 'lister.place-setup.place-amenities.store']);


    // User Answered Questions
    Route::get('account-settings/compatibility-questions/unanswered', [ListerUnansweredCompatibilityQuestionsController::class, 'index'])
        ->name('lister.compatibility-questions.unanswered.index');

    // User Answered Questions
    Route::get('account-settings/compatibility-questions/answered', [ListerAnsweredCompatibilityQuestionsController::class, 'index'])
        ->name('lister.compatibility-questions.answered.index');

    // User Compatibility Questions
    Route::resource('compatibility-questions', ListerCompatibilityQuestionsController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'lister.compatibility-questions.create', 'store' => 'lister.compatibility-questions.store']);
});

// Admin routes 
Route::prefix('admin')->group(function () {
    // admin dashboard home
    Route::get('dashboard', [AdminHomeController::class, 'index'])
        ->name('admin.home');

    // Admin Users
    Route::get('users', [AdminUsersController::class, 'index'])
        ->name('admin.users.index');
    Route::post('users', [AdminUsersController::class, 'store'])
        ->name('admin.users.store');
    Route::get('users/{user}/edit', [AdminUsersController::class, 'edit'])
        ->name('admin.users.edit');
    Route::put('users/{user}', [AdminUsersController::class, 'update'])
        ->name('admin.users.update');
    Route::delete('users/{user}', [AdminUsersController::class, 'destroy'])
        ->name('admin.users.destroy');

    // Admin places
    Route::get('places', [AdminPlacesController::class, 'index'])
        ->name('admin.places.index');
    Route::post('places', [AdminPlacesController::class, 'store'])
        ->name('admin.places.store');
    Route::get('places/{place}/edit', [AdminPlacesController::class, 'edit'])
        ->name('admin.places.edit');
    Route::put('places/{place}', [AdminPlacesController::class, 'update'])
        ->name('admin.places.update');
    Route::delete('places/{place}', [AdminPlacesController::class, 'destroy'])
        ->name('admin.places.destroy');

    // Admin Users
    Route::get('compatibility-questions', [AdminCompatibilityQuestionsController::class, 'index'])
        ->name('admin.compatibility-questions.index');
    Route::post('compatibility-questions', [AdminCompatibilityQuestionsController::class, 'store'])
        ->name('admin.compatibility-questions.store');
    Route::get('compatibility-questions/{compatibility_question}/edit', [AdminCompatibilityQuestionsController::class, 'edit'])
        ->name('admin.compatibility-questions.edit');
    Route::put('compatibility-questions/{compatibility_question}', [AdminCompatibilityQuestionsController::class, 'update'])
        ->name('admin.compatibility-questions.update');
    Route::delete('compatibility-questions/{compatibility_question}', [AdminCompatibilityQuestionsController::class, 'destroy'])
        ->name('admin.compatibility-questions.destroy');
});



// Account setting
// Route::get('/user/dashboard/account-settings', [AccountSettingsController::class, 'index'])
// ->name('user.account-settings.index');

// User Answered Questions
// Route::get('/user/dashboard/account-settings/compatibility-questions/unanswered', [UnansweredCompatibilityQuestionsController::class, 'index'])
//     ->name('user.compatibility-questions.unanswered.index');

// // User Answered Questions
// Route::get('/user/dashboard/account-settings/compatibility-questions/answered', [AnsweredCompatibilityQuestionsController::class, 'index'])
//     ->name('user.compatibility-questions.answered.index');

// // User Compatibility Questions
// Route::resource('/user/compatibility-questions', CompatibilityQuestionsController::class)
//     ->only(['create', 'store'])
//     ->names(['create' => 'user.compatibility-questions.create', 'store' => 'user.compatibility-questions.store']);


/**
 * PROFILE SETUP ROUTES
 * 
 */

// User Place  Preferences Profile Setup
Route::prefix('user/profile-setup')->group(function () {
    Route::resource('place-preferences', UserPlacePreferencesProfileSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'user.profile-setup.place-preferences.create', 'store' => 'user.profile-setup.place-preferences.store']);

    // User Place s Profile Setup
    Route::resource('places', UserPlacesProfileSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'user.profile-setup.places.create', 'store' => 'user.profile-setup.places.store']);

    // User basic profile Profile Setup
    Route::resource('basic-profile', UserBasicProfileProfileSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'user.profile-setup.basic-profile.create', 'store' => 'user.profile-setup.basic-profile.store']);

    // User personal preferences Profile Setup
    Route::resource('personal-preferences', UserPersonalPreferencesProfileSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'user.profile-setup.personal-preferences.create', 'store' => 'user.profile-setup.personal-preferences.store']);

    // User compatibility preferences Profile Setup
    Route::resource('compatibility-preferences', UserCompatibilityPreferencesProfileSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'user.profile-setup.compatibility-preferences.create', 'store' => 'user.profile-setup.compatibility-preferences.store']);

    // User Interests Profile Setup
    Route::resource('interests', UserInterestsProfileSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'user.profile-setup.interests.create', 'store' => 'user.profile-setup.interests.store']);

    // User locations
    Route::resource('user-location', UserUserLocationProfileSetupController::class)
        ->only(['create', 'store'])
        ->names(['create' => 'user.profile-setup.user-locations.create', 'store' => 'user.profile-setup.user-locations.store']);
});

/**
 * PLACE  SETUP ROUTES
 * 
 */

// User Interests Profile Setup
// Route::resource('/user/place-setup/place', UserPlaceSetupController::class)
//     ->only(['create', 'store'])
//     ->names(['create' => 'user.place-setup.places.create', 'store' => 'user.place-setup.places.store']);
// // User place  location Setup
// Route::resource('/user/place-setup/place-location', UserPlaceLocationSetupController::class)
//     ->only(['create', 'store'])
//     ->names(['create' => 'user.place-setup.place-locations.create', 'store' => 'user.place-setup.place-locations.store']);
// // User place  amenities Setup
// Route::resource('/user/place-setup/place-amenities', UserPlaceAmenitiesSetupController::class)
//     ->only(['create', 'store'])
//     ->names(['create' => 'user.place-setup.place-amenities.create', 'store' => 'user.place-setup.place-amenities.store']);


/**
 * USER ACCOUNT ROUTES
 * 
 */

// User Answered Questions
// Route::get('/user/place-requests/sent', [UserSentPlaceRequestsController::class, 'index'])
//     ->name('user.place-requests.sent.index');
// Route::get('/user/place-requests/received', [UserReceivedPlaceRequestsController::class, 'index'])
//     ->name('user.place-requests.received.index');

// // User Place Requests
// Route::resource('/user/place-requests', UserPlaceRequestsController::class)->names([
//     'index'     => 'user.place-requests.index',
//     'create'    => 'user.place-requests.create',
//     'store'     => 'user.place-requests.store',
//     'show'      => 'user.place-requests.show',
//     'edit'      => 'user.place-requests.edit',
//     'store'     => 'user.place-requests.store',
//     'update'    => 'user.place-requests.update',
//     'destroy'   => 'user.place-requests.destroy'
// ]);

// // User Compatibility Questions
// Route::resource('/user/compatibility-questions', CompatibilityQuestionsController::class)->names([
//     'index'     => 'user.compatibility-questions.index',
//     'create'    => 'user.compatibility-questions.create',
//     'store'     => 'user.compatibility-questions.store',
//     'show'      => 'user.compatibility-questions.show',
//     'edit'      => 'user.compatibility-questions.edit',
//     'store'     => 'user.compatibility-questions.store',
//     'update'    => 'user.compatibility-questions.update',
//     'destroy'   => 'user.compatibility-questions.destroy'
// ]);

// // User Place  Preferences
// Route::resource('/user/place-preferences', UserPlacePreferencesController::class)->names([
//     'index'     => 'user.place-preferences.index',
//     'create'    => 'user.place-preferences.create',
//     'store'     => 'user.place-preferences.store',
//     'show'      => 'user.place-preferences.show',
//     'edit'      => 'user.place-preferences.edit',
//     'store'     => 'user.place-preferences.store',
//     'update'    => 'user.place-preferences.update',
//     'destroy'   => 'user.place-preferences.destroy'
// ]);

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
// Route::resource('/user/places', UserPlacesController::class)->names([
//     'index'     => 'user.places.index',
//     'create'    => 'user.places.create',
//     'store'     => 'user.places.store',
//     'show'      => 'user.places.show',
//     'edit'      => 'user.places.edit',
//     'store'     => 'user.places.store',
//     'update'    => 'user.places.update',
//     'destroy'   => 'user.places.destroy'
// ]);

// User Place  Location
// Route::resource('/user/place-locations', UserPlaceLocationsController::class)->names([
//     'index'     => 'user.place-locations.index',
//     'create'    => 'user.place-locations.create',
//     'store'     => 'user.place-locations.store',
//     'show'      => 'user.place-locations.show',
//     'edit'      => 'user.place-locations.edit',
//     'store'     => 'user.place-locations.store',
//     'update'    => 'user.place-locations.update',
//     'destroy'   => 'user.place-locations.destroy'
// ]);

// User Location
// Route::resource('/user/user-locations', UserUserLocationsController::class)->names([
//     'index'     => 'user.user-locations.index',
//     'create'    => 'user.user-locations.create',
//     'store'     => 'user.user-locations.store',
//     'show'      => 'user.user-locations.show',
//     'edit'      => 'user.user-locations.edit',
//     'store'     => 'user.user-locations.store',
//     'update'    => 'user.user-locations.update',
//     'destroy'   => 'user.user-locations.destroy'
// ]);

// User place amenities
// Route::get('/user/place/{place}/amenities/edit', [UserPlaceAmenitiesController::class, 'edit'])
//     ->name('user.place.amenities.edit');
// Route::put('/user/place/{place}/amenities', [UserPlaceAmenitiesController::class, 'update'])
//     ->name('user.place.amenities.update');


// User basic profile
// Route::resource('/user/basic-profile', UserBasicProfileController::class)->names([
//     'index'     => 'user.basic-profile.index',
//     'create'    => 'user.basic-profile.create',
//     'store'     => 'user.basic-profile.store',
//     'show'      => 'user.basic-profile.show',
//     'edit'      => 'user.basic-profile.edit',
//     'store'     => 'user.basic-profile.store',
//     'update'    => 'user.basic-profile.update',
//     'destroy'   => 'user.basic-profile.destroy'
// ]);

// // User occupations
// Route::resource('/user/occupations', UserOccupationsController::class)->names([
//     'index'     => 'user.occupations.index',
//     'create'    => 'user.occupations.create',
//     'store'     => 'user.occupations.store',
//     'show'      => 'user.occupations.show',
//     'edit'      => 'user.occupations.edit',
//     'store'     => 'user.occupations.store',
//     'update'    => 'user.occupations.update',
//     'destroy'   => 'user.occupations.destroy'
// ]);

// // User spoken languages
// Route::resource('/user/spoken-languages', UserSpokenLanguagesController::class)->names([
//     'index'     => 'user.spoken-languages.index',
//     'create'    => 'user.spoken-languages.create',
//     'store'     => 'user.spoken-languages.store',
//     'show'      => 'user.spoken-languages.show',
//     'edit'      => 'user.spoken-languages.edit',
//     'store'     => 'user.spoken-languages.store',
//     'update'    => 'user.spoken-languages.update',
//     'destroy'   => 'user.spoken-languages.destroy'
// ]);

// User personal preferences
// Route::resource('/user/personal-preferences', UserPersonalPreferencesController::class)->names([
//     'index'     => 'user.personal-preferences.index',
//     'create'    => 'user.personal-preferences.create',
//     'store'     => 'user.personal-preferences.store',
//     'show'      => 'user.personal-preferences.show',
//     'edit'      => 'user.personal-preferences.edit',
//     'store'     => 'user.personal-preferences.store',
//     'update'    => 'user.personal-preferences.update',
//     'destroy'   => 'user.personal-preferences.destroy'
// ]);

// // User compatibility preferences
// Route::resource('/user/compatibility-preferences', UserCompatibilityPreferencesController::class)->names([
//     'index'     => 'user.compatibility-preferences.index',
//     'create'    => 'user.compatibility-preferences.create',
//     'store'     => 'user.compatibility-preferences.store',
//     'show'      => 'user.compatibility-preferences.show',
//     'edit'      => 'user.compatibility-preferences.edit',
//     'store'     => 'user.compatibility-preferences.store',
//     'update'    => 'user.compatibility-preferences.update',
//     'destroy'   => 'user.compatibility-preferences.destroy'
// ]);

// // User Interests
// Route::resource('/user/interests', UserInterestsController::class)->names([
//     'index'     => 'user.interests.index',
//     'create'    => 'user.interests.create',
//     'store'     => 'user.interests.store',
//     'show'      => 'user.interests.show',
//     'edit'      => 'user.interests.edit',
//     'store'     => 'user.interests.store',
//     'update'    => 'user.interests.update',
//     'destroy'   => 'user.interests.destroy'
// ]);
