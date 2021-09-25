<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Venue;
use App\Models\User;
use App\Models\Locations;
use App\Models\TimeSlots;
use App\Models\Booking;

class UserMiddlewareController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function mybooking()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id',$user->id)->paginate(5);
        return view('frontend.mybooking',compact('user', 'bookings'));
    }

    public function myreceipt($id)
    {
        $booking = Booking::find($id);
        return view('frontend.receipt', compact('booking'));
    }

    public function UserProfile()
    {
        $user = Auth::user();
        $profile = User::where('id',$user->id)->get();
        return view('frontend.userprofile',compact('user', 'profile'));
    }
}
