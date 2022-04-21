<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PlaceListing;
use App\Models\User;
use App\References\ProfileStatus;
use App\References\UserType;
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
        /**
         * If the user is a Lister or Searcher
         * If the user is a Lister, then show all searchers that match the Listers posting
         * If the user is a Searcher, then show all the Listed places that match the users preferences
         * Note: the Searcher can also be shown all other similar Listers to them, incase they want to rent a free space together
         *      this feature should be implemented later on.
         */

        // Obtain the user_type,
        // generate all the people or and places
        $user_type = auth()->user()->type;



        // return a view based on the user type
        if ($user_type == UserType::LISTER) {
            $people = User::where('type', UserType::SEARCHER)
                ->where('profile_status', ProfileStatus::COMPLETE)
                ->with([
                    'basicProfile',
                    'placeListingPreference'
                ])->paginate();
                // dd($people->toArray());
            return view('user/lister/home', compact('people'));
        }

        if ($user_type == UserType::SEARCHER) {
            // A searcher should be matched with places and people

            // for now just generate all the place listing or people that match the current user preferences
            // $people = User::where('type', UserType::SEARCHER);
            $places = PlaceListing::with([
                'user', 
                'amenities',
                'placeListingLocation.city',
                'placeListingLocation.locality'
            ])->paginate();

            // dd($places->toArray());

            return view('user/searcher/home', compact('places'));
        }
    }
}
