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
use App\Http\Controllers\User\InterestsController as UserInterestsController;

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

// admin dashboard home
Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])
->name('admin.home');

// Account setting
Route::get('/user/dashboard/account-settings', [AccountSettingsController::class, 'index'])
->name('user.account-settings.index');

// User Answered Questions
Route::get('/user/dashboard/account-settings/compatibility-questions/unanswered', [UnansweredCompatibilityQuestionsController::class, 'index'])
->name('user.compatibility-questions.unanswered.index');
Route::post('/user/dashboard/account-settings/compatibility-questions/unanswered', [UnansweredCompatibilityQuestionsController::class, 'store'])
->name('user.compatibility-questions.unanswered.store');

// User Answered Questions
Route::get('/user/dashboard/account-settings/compatibility-questions/answered', [AnsweredCompatibilityQuestionsController::class, 'index'])
->name('user.compatibility-questions.answered.index');
 Route::put('/user/dashboard/account-settings/compatibility-questions/{CompatibilityQuestion}/answered', [AnsweredCompatibilityQuestionsController::class, 'update'])
 ->name('user.compatibility-questions.answered.update');
 Route::delete('/user/dashboard/account-settings/compatibility-questions/{CompatibilityQuestion}/answered', [AnsweredCompatibilityQuestionsController::class, 'destroy'])
 ->name('user.compatibility-questions.answered.destroy');

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
