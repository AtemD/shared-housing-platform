<?php

namespace App\Http\Controllers\User;

use App\Helpers\PLaceListingSetup;
use App\Http\Controllers\Controller;
use App\Models\PlaceListing;
use App\Helpers\ProfileSetup;
use App\Models\Amenity;
use App\Models\City;
use App\Models\User;
use App\References\Currency;
use App\References\PlaceType;
use App\References\FurnishingType;
use App\References\PeriodType;
use App\References\ProfileStatus;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PlaceListingsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->load('placeListings');

        return view('user/place-listings/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/place-listings/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());

        $validatedData = $request->validate([
            'rent_amount' => ['required', 'integer'],
            'rent_period' => ['required', 'integer'],
            'bills_included' => ['required', 'string', Rule::in("yes", "no")],
            'currency' => ['required', 'integer', Rule::in(array_keys(Currency::currencyList()))],
            'place_type' => ['required', 'integer', Rule::in(array_keys(PlaceType::placeTypeList()))],
            'furnishing_type' => ['required', 'integer', Rule::in(array_keys(FurnishingType::furnishingTypeList()))],
            'min_stay_period' => ['required', 'integer'],
            'min_stay_period_type' => ['required', 'integer', Rule::in(array_keys(PeriodType::rentPeriodTypeList()))],
            'availability_date' => ['required', 'date_format:Y-m-d'],
            'description' => ['required', 'max:1000'],
            // 'featured_image' => ['required', 'image', 'max:4096', 'mimes:jpg,jpeg,png'],
        ]);

        // dd($validatedData);

        // Start a db transaction
        // Store the image in the database
        // Then create the place listing
        // Exit the transaction

        // auth()->user()->placeListings()->create([
        //     'rent_amount' => $validatedData['rent_amount'],
        //     'rent_period' => $validatedData['rent_period'],
        //     'rent_currency' => $validatedData['currency'],
        //     'bills_included' => $validatedData['bills_included'],
        //     'place_type' => $validatedData['place_type'],
        //     'furnishing_type' => $validatedData['furnishing_type'],
        //     'min_stay_period' => PeriodType::convertPeriodTypeToDays($validatedData['min_stay_period_type']),
        //     'min_stay_period_type' => $validatedData['min_stay_period_type'] == "yes" ? true : false,
        //     'availability_date' => $validatedData['availability_date'],
        //     'description' => $validatedData['description'],
        //     'featured_image_id' => 1, 
        // ]);

        // Store the validated data in the session
        // if($request->session()->has('profile_setup.place_listings')){
        //     $request->session('profile_setup.place_listings')->forget(['featured_image']);
        // }  
        
        // dd($request->session('profile_setup'));

        // store the image in temporary storage to be processed later.
        // $path = request()->file('featured_image')->storePublicly('/temp');

        $request->session()->put('place_listing_setup.place_listing', [
            'rent_amount' => $validatedData['rent_amount'],
            'rent_period' => $validatedData['rent_period'],
            'rent_currency' => $validatedData['currency'],
            'bills_included' => $validatedData['bills_included'],
            'place_type' => $validatedData['place_type'],
            'furnishing_type' => $validatedData['furnishing_type'],
            'min_stay_period' => PeriodType::convertPeriodTypeToDays($validatedData['min_stay_period_type']),
            'min_stay_period_type' => $validatedData['min_stay_period_type'],
            'availability_date' => $validatedData['availability_date'],
            'description' => $validatedData['description'],
            'profile_status' => ProfileStatus::PROCESSING,
            'featured_image' => 'imag1.jpg',
            // 'featured_image' => $path,
        ]);

        $next_step = PLaceListingSetup::determineNextStep(PLaceListingSetup::STEP_1);
        return redirect($next_step);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PlaceListing  $place_listing
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaceListing $place_listing)
    {
        $place_listing = $place_listing->load(['placeListingLocation', 'amenities']);
        $cities = City::all();
        $amenities = Amenity::all();

        return view('user/place-listings/edit', compact('place_listing', 'cities', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
