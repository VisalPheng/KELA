<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Booking;
use App\Models\Venue;
use App\Models\TimeSlots;
use App\Mail\BookingMail;

class VenueBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function createReservedBooking()
    {
        $user = Auth::user();
        $timeslots = TimeSlots::where('user_id', $user->id)->where('status', 1)->get();
        $venues = Venue::where('user_id', $user->id)->where('status', 1)->get();
        $bookingid = sprintf("%06d", mt_rand(1, 999999));
        return view('venuedashboard.booking.create', compact('timeslots','bookingid','venues'));
    }

    public function storeReservedBooking(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
            'bookingdate' => 'required',
            'timeslot_id' => 'required',
            'venue_id' => 'required',
            'bookingid' => 'required',
        ]);

        $request['user_id']=Auth::id();
        $booking = $request->toArray();

        $bookingplaced = Booking::create($booking);
        Mail::to($bookingplaced->email)->send(new BookingMail($bookingplaced));
        return redirect()->route('venuedashboard.booking.all')->with('success', 'Booking successfully.');
    }

    public function listAllBooking()
    {
        $user = Auth::user();
        $venue = Venue::where('user_id', $user->id)->select('id')->get();
        if($venue){
            $venue = $venue->toArray();
            $allbooking = Booking::whereIn('venue_id', $venue)->orderBy('id','DESC')->paginate(5);
        } else {
            $allbooking = null;
        }
        
        return view('venuedashboard.booking.allbooking', compact('allbooking'));
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('venuedashboard.booking.edit')->with('booking',$booking);
    }

    public function update(Request $request,$id)
    {
        $booking = Booking::find($id);

        $booking->status = $request->input('approve');
        $booking->save();

        return redirect()->route('venuedashboard.booking.all')->with('updated', 'Booking updated successfully.');
        
    }

    public function BookingReceipt($id)
    {
        $booking = Booking::find($id);
        return view('venuedashboard.booking.receipt', compact('booking'));
    }

    public function destroy($id)
    {
        Booking::find($id)->delete();
        return redirect()->route('venuedashboard.booking.all')
                        ->with('success','Booking deleted successfully');
    }
}
