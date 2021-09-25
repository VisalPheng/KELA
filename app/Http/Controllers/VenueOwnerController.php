<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\TimeSlots;
use App\Models\Booking;
use Auth;

class VenueOwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function dashboard()
    {
        $user = Auth::user();
        $venueCount = Venue::where('user_id',$user->id)->count();
        $allvenues = Venue::where('user_id',$user->id)->paginate(5);
        $venue = Venue::where('user_id', $user->id)->select('id')->get();
        if($venue){
            $venue = $venue->toArray();
            $bookingCount = Booking::whereIn('venue_id', $venue)->count();
            $allbookings = Booking::whereIn('venue_id', $venue)->paginate(5);
        } else {
            $allbookings = null;
        }
        $timeslotCount = TimeSlots::where('user_id',$user->id)->count();
        $alltimeslots = TimeSlots::where('user_id',$user->id)->paginate(5);
        return view('venuedashboard.dashboard', compact(
            'venueCount',
            'bookingCount',
            'timeslotCount',
            'allbookings',
            'allvenues',
            'alltimeslots',
        ));
    }
}
