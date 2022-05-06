<?php

namespace App\Http\Controllers\Searcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceivedPlaceRequestsController extends Controller
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
        $received_place_requests = auth()->user()->placeRequests()->paginate();
        // dd($received_place_requests->first()->toArray());
        // dd($received_place_requests->toArray());
        // dd($received_place_requests->toArray());
        // dd(auth()->user()->id);
        $places = auth()->user()->places()->get();
        // dd($places->toArray());
        
        // dd($places->find(66)->slug);
        // dd($places->where('id', $received_place_requests->pivot->place_id)->first());
        // dd($places->where('id', $request->pivot->place_id)->first())
        // dd($places->where('id', 66)->first()->slug);

        return view('searcher/place-requests/received/index', compact('received_place_requests', 'places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
