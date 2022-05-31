<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\User;
use App\References\ProfileStatus;
use App\References\UserType;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
        

        // $set_of_common_questions = collect();
        // dd($set_of_common_questions->isEmpty());
        // $user = auth()->user()->load('compatibilityQuestions');
        // $user_A_compatibility_questions = $user->compatibilityQuestions->pluck('id');
        // dd($user_A_compatibility_questions->isEmpty());
//         $place = auth()->user()->places()->with('placeLocation')->latest()->first();
//         // dd($place->toArray());
// // dd($place->getAttributes()['rent_amount']);
//         $searchers = (new User)->newQuery();
//         $searchers = $searchers->whereHas(
//             'placePreference', function (Builder $query) use ($place) {
//                 $query->where('min_rent_amount', '<=', $place->getAttributes()['rent_amount'])
//                     ->where('max_rent_amount', '>=', $place->getAttributes()['rent_amount']);
//             }
//         );

//         dd($searchers->get()->toArray());

//         $searchers = $searchers->whereHas(
//             'placePreference.preferredLocations', function (Builder $query) use ($place) {
//                 $query->where('city_id', $place->placeLocation->city_id);
//             },
//         );

//         // dd($searchers->toSql());
//         dd($searchers->get()->toArray());

//         $searchers = $searchers->with([
//             'compatibilityQuestions'
//         ])->get();

//         dd($searchers);

//         dd($place->toArray());
        // dd('hit');
        return view('lister/home');
        /**
         * If the user is a Lister or Searcher
         * If the user is a Lister, then show all searchers that match the Listers posting
         * If the user is a Searcher, then show all the Listed places that match the users preferences
         * Note: the Searcher can also be shown all other similar Listers to them, incase they want to rent a free space together
         *      this feature should be implemented later on.
         */

        // Obtain the user_type,
        // generate all the people or and places
        // $user_type = auth()->user()->type;



        // return a view based on the user type
        // if ($user_type == UserType::LISTER) {
        //     $people = User::where('type', UserType::SEARCHER)
        //         ->where('profile_status', ProfileStatus::COMPLETE)
        //         ->with([
        //             'basicProfile',
        //             'placePreference'
        //         ])->paginate();
                // dd($people->toArray());
            // return view('lister/lister/home', compact('people'));
        // }

        // if ($user_type == UserType::SEARCHER) {
            // A searcher should be matched with places and people

            // for now just generate all the place  or people that match the current user preferences
            // $people = User::where('type', UserType::SEARCHER);
            // $places = Place::with([
            //     'user', 
            //     'amenities',
            //     'placeLocation.city',
            //     'placeLocation.locality'
            // ])->paginate();

            // dd($places->toArray());

            // return view('lister/home', compact('places'));
        // }
    }
}
