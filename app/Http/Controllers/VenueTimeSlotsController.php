<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\TimeSlots;
use Auth;

class VenueTimeSlotsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        $user = Auth::user();
        $alltimeslots = TimeSlots::where('user_id',$user->id)->orderBy('id','DESC')->paginate(5);
        return view('venuedashboard.timeslots.index')->with(["alltimeslots"=>$alltimeslots]);
    }

    public function create()
    {
        $user = Auth::user();
        $venues = Venue::where('user_id',$user->id)->get();
        return view('venuedashboard.timeslots.create')->with(["venues"=>$venues]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'starttime' => 'required',
            'endtime' => 'required',
            'venue_id' => 'required',
        ]);
        $request['user_id']=Auth::id();
        $timeslot = $request->toArray();
        TimeSlots::create($timeslot);
    
        return redirect()->route('venuedashboard.timeslots.index')
                        ->with('success','Time Slot created successfully');
    }

    public function edit($id)
    {
        $timeslot = TimeSlots::find($id);
        return view('venuedashboard.timeslots.edit')->with('timeslot',$timeslot);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'starttime' => 'required',
            'endtime' => 'required',
        ]);

        $timeslot = TimeSlots::find($id);

        $timeslot->starttime = $request->input('starttime');
        $timeslot->endtime = $request->input('endtime');
        $timeslot->status = $request->input('approve');
        $timeslot->save();

        return redirect()->route('venuedashboard.timeslots.index')->with('updated', 'Time Slot updated successfully.');
        
    }

    public function destroy($id)
    {
        TimeSlots::find($id)->delete();
        return redirect()->route('venuedashboard.timeslots.index')
                        ->with('danger','Time Slot deleted successfully');
    }
}
