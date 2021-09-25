<?php

namespace App\Http\Controllers;

use App\Models\EventsandOffers;
use Illuminate\Http\Request;
use Auth;

class EventsandOffersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventsandoffers = EventsandOffers::orderBy('id','DESC')->paginate(6);
        return view('dashboard.eventsandoffers.index')->with(["eventsandoffers"=>$eventsandoffers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.eventsandoffers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'img_url' => 'required',
        ]);

        $img = $request->file('img_url');
        $img_name = time().'.'.$img->extension();
        $request->file('img_url')->move(public_path('images'),$img_name);
        $request['user_id']=Auth::id();
        $eventandoffer = $request->toArray();
        $eventandoffer['img_url'] = $img_name;
        EventsandOffers::create($eventandoffer);

        return redirect()->route('admin.eventsandoffers.index')
        ->with('success','Events and Offers created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventandoffer = EventsAndOffers::find($id);
        return view('dashboard.eventsandoffers.edit', ['eventandoffer' => $eventandoffer]);
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $eventandoffer = EventsAndOffers::find($id);

        $eventandoffer->name = $request->input('name');
        $eventandoffer->description = $request->input('description');
        $eventandoffer->status = $request->input('approve');

        if($request->hasfile('img_url')) {
            $img = $request->file('img_url');
            $extension = $img->getClientOriginalExtension();
            $img_name = time().'.'.$img->extension();
            $img->move(public_path('images'),$img_name);
            $eventandoffer->img_url = $img;
            $eventsandoffers = $request->toArray();
            $eventsandoffers['img_url'] = $img_name;
            $eventandoffer->update($eventsandoffers);
        }
        $eventandoffer->save();

        return redirect()->route('admin.eventsandoffers.index')->with('updated', 'Events and Offers updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EventsAndOffers::find($id)->delete();
        return redirect()->route('admin.eventsandoffers.index')->with('deleted','Venue deleted successfully');
    }
}
