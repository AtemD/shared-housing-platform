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
Route::get('/user/dashboard/', [UserHomeController::class, 'index'])
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

// Compatibility Questions
Route::get('/user/dashboard/account-settings/compatibility-questions/', [CompatibilityQuestionsController::class, 'index'])
->name('user.compatibility-questions.index');
Route::get('/user/dashboard/account-settings/compatibility-questions/create', [CompatibilityQuestionsController::class, 'create'])
->name('user.compatibility-questions.create');
Route::post('/user/dashboard/account-settings/compatibility-questions', [CompatibilityQuestionsController::class, 'store'])
->name('user.compatibility-questions.store');
Route::get('/user/dashboard/account-settings/compatibility-questions/{CompatibilityQuestion}', [CompatibilityQuestionsController::class, 'show'])
->name('user.compatibility-questions.show');
Route::get('/user/dashboard/account-settings/compatibility-questions/{CompatibilityQuestion}/edit', [CompatibilityQuestionsController::class, 'edit'])
->name('user.compatibility-questions.edit'); // they own the question and its not verified yet
Route::put('/user/dashboard/account-settings/compatibility-questions/{CompatibilityQuestion}', [CompatibilityQuestionsController::class, 'update'])
->name('user.compatibility-questions.update');
Route::delete('/user/dashboard/account-settings/compatibility-questions/{CompatibilityQuestion}', [CompatibilityQuestionsController::class, 'destroy'])
->name('user.compatibility-questions.destroy');

// Answer Compatibility questions controller
// Route::get('/user/dashboard/account-settings/compatibility-questions/{CompatibilityQuestion}', [AnswerCompatibilityQuestionsController::class, 'index'])
// ->name('user.compatibility-questions.index');


Route::get('/user/dashboard/place-listing-preferences/create', [UserPlaceListingPreferencesController::class, 'create'])
->name('user.place-listing-preferences.create');
Route::post('/user/dashboard/place-listing-preferences/store', [UserPlaceListingPreferencesController::class, 'store'])
->name('user.place-listing-preferences.store');

Route::get('/user/dashboard/place-listings/create', [UserPlaceListingsController::class, 'create'])
->name('user.place-listings.create');
Route::post('/user/dashboard/places-listings/store', [UserPlaceListingsController::class, 'store'])
->name('user.place-listings.store');

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
Route::get('/user/dashboard/basic-profile/create', [UserBasicProfileController::class, 'create'])
->name('user.basic-profile.create');
Route::get('/user/dashboard/basic-profile/{BasicProfile}/edit', [UserBasicProfileController::class, 'edit'])
->name('user.basic-profile.edit');
Route::post('/user/dashboard/basic-profile', [UserBasicProfileController::class, 'store'])
->name('user.basic-profile.store');

Route::get('/user/dashboard/personal-preferences/create', [UserPersonalPreferencesController::class, 'create'])
->name('user.personal-preferences.create');
Route::post('/user/dashboard/personal-preferences/store', [UserPersonalPreferencesController::class, 'store'])
->name('user.personal-preferences.store');

Route::get('/user/dashboard/compatibility-preferences/create', [UserCompatibilityPreferencesController::class, 'create'])
->name('user.compatibility-preferences.create');
Route::post('/user/dashboard/compatibility-preferences/store', [UserCompatibilityPreferencesController::class, 'store'])
->name('user.compatibility-preferences.store');

Route::get('/user/dashboard/interests/create', [UserInterestsController::class, 'create'])
->name('user.interests.create');
Route::post('/user/dashboard/interests/store', [UserInterestsController::class, 'store'])
->name('user.interests.store');
