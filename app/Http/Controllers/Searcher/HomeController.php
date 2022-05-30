<?php

namespace App\Http\Controllers\Searcher;

use App\Http\Controllers\Controller;
use App\Jobs\MatchSearcherWithListersJob;
use App\Models\Place;
use App\Models\User;
use App\References\CompatibilityQuestionRelevance;

// use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'profile.setup']);
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        // dd('hit');
        // dd(auth()->user()->places()->exists());
        // MatchSearcherWithListersJob::dispatch(auth()->user());

        $place_preferences = auth()->user()->placePreference()->firstOrFail();

dd($place_preferences);
        // 2. Retrieve all the preferred locations of the place preference and extract the city_id
        // $city_id = $place_preferences->preferredLocations()->get()->pluck('city_id')[0];

        // // 3. Using the Searchers place preference, obtain all the matching listed places together with their Listers
        // $places = (new Place)->newQuery();
        // $places = $places->whereBetween('rent_amount', [
        //     $place_preferences->getAttributes()['min_rent_amount'],
        //     $place_preferences->getAttributes()['max_rent_amount']
        // ]);
        // $places = $places->whereHas('placeLocation', function ($query) use ($city_id) {
        //     $query->where('city_id', $city_id);
        // });
        // $places = $places->with([
        //     'user.compatibilityQuestions', // user here is the lister of the place, i.e. the owner
        // ])->get();

        dd('hit here');

         return view('searcher/home');
    }
    
}
