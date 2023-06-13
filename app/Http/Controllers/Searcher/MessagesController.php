<?php

namespace App\Http\Controllers\Searcher;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
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
     * Display a  of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = auth()->user()->messages()->paginate(6);
// dd($messages->toArray());
        return view('searcher/messages/index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('searcher/messages/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store the Searcher messsage, sent to the receiver.
        $validatedData = $request->validate([
            'message' => ['required', 'max:1000'],
            'receiver' => ['required', 'max:1000'],
        ]);

        $receiver = User::where('slug', $validatedData['receiver'])->firstOrFail();

        auth()->user()->messages()->create([
            'body' => $validatedData['message'],
            'receiver_id' => $receiver->id,
        ]);

        return back()->with('success', 'Your message has been sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('searcher/places/show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('searcher/places/edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    { 
        $validatedData = $request->validate([
            'rent_amount' => ['required', 'integer'],
            'rent_period' => ['required', 'integer'],
            'availability_date' => ['required', 'date_format:Y-m-d'],
            'description' => ['required', 'max:1000'],
            // 'featured_image' => ['required', 'image', 'max:4096', 'mimes:jpg,jpeg,png'],
        ]);

        return redirect()->route('user.places.edit', ['place' => $place->slug])
            ->with('success', 'Place  Details Have Been Updated Successfully');
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
