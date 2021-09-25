<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Venue;
use App\Models\Booking;
use App\Models\Locations;
use App\Models\TimeSlots;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function admin()
    {
        $user = Auth::user();
        $userCount = User::count();
        $venueCount = Venue::count();
        $bookingCount = Booking::count();
        $locationCount = Locations::count();
        $timeslotCount = TimeSlots::count();
        $approvedVenueCount = Venue::where('status', 1)->count();
        $alltimeslots = TimeSlots::paginate(6);
        $allvenues = Venue::paginate(6);
        $allbookings = Booking::paginate(6);
        return view('dashboard.dashboard', compact(
            'userCount',
            'venueCount',
            'bookingCount',
            'locationCount',
            'approvedVenueCount',
            'timeslotCount',
            'alltimeslots',
            'allvenues',
            'allbookings'
        ));
    }

}
