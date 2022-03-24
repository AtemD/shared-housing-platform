<?php

namespace App\Http\Controllers\User\AccountSetup;

use App\Http\Controllers\Controller;
use App\Models\PlaceListing;
use App\References\Currency;
use App\References\PlaceType;
use App\References\FurnishingType;
use App\References\PeriodType;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/user/account-setup/place-listings/create');
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
            'bills_included' => ['required', 'boolean'],
            'currency' => ['required', 'integer', Rule::in(array_keys(Currency::currencyList()))],
            'place_type' => ['required', 'integer', Rule::in(array_keys(PlaceType::placeTypeList()))],
            'furnishing_type' => ['required', 'integer', Rule::in(array_keys(FurnishingType::furnishingTypeList()))],
            'min_stay_period' => ['required', 'integer'],
            'min_stay_period_type' => ['required', 'integer', Rule::in(array_keys(PeriodType::rentPeriodTypeList()))],
            'availability_date' => ['required', 'date_format:Y-m-d'],
            'description' => ['required', 'max:1000'],
            'featured_image' => ['required', 'image', 'max:4096', 'mimes:jpg,jpeg,png'],
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
        //     'availability_date' => $validatedData['availability_date'],
        //     'description' => $validatedData['description'],
        //     'featured_image_id' => 1, 
        // ]);

        // dd('created');

        // Store the validated data in the session
        $request->session()->put('account_setup.place_listing', [
            'rent_amount' => $validatedData['rent_amount'],
            'rent_period' => $validatedData['rent_period'],
            'rent_currency' => $validatedData['currency'],
            'bills_included' => $validatedData['bills_included'],
            'place_type' => $validatedData['place_type'],
            'furnishing_type' => $validatedData['furnishing_type'],
            'min_stay_period' => PeriodType::convertPeriodTypeToDays($validatedData['min_stay_period_type']),
            'availability_date' => $validatedData['availability_date'],
            'description' => $validatedData['description'],
            'featured_image_id' => $validatedData['featured_image'],
        ]);

        dd(session('account_setup.place_listing'));

        return redirect()->route('user.account-setup.place-listing-preferences.create');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
