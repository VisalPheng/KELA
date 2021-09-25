<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Booking;
use App\Models\Venue;
use App\Models\TimeSlots;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingMail;
use App\Mail\BookingConfirmMail;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function createReservedBooking()
    {
        $timeslots = TimeSlots::where('status', 1)->get();
        $venues = Venue::where('status', 1)->get();
        $bookingid = sprintf("%06d", mt_rand(1, 999999));
        return view('dashboard.booking.create', compact('timeslots','bookingid','venues'));
    }

    public function createBooking($id)
    {
        $timeslot = TimeSlots::find($id);
        $bookingid = sprintf("%06d", mt_rand(1, 999999));
        return view('frontend.booking', compact('timeslot','bookingid'));
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
        return redirect()->route('admin.booking.all')->with('success', 'Booking successfully.');
    }

    public function store(Request $request)
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
        return view('frontend.bookingsuccessful');
    }
    
    public function listAllBooking()
    {
        $allbooking = Booking::orderBy('id','DESC')->paginate(5);
        return view('dashboard.booking.allbooking', compact('allbooking'));
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('dashboard.booking.edit')->with('booking',$booking);
    }

    public function update(Request $request,$id)
    {
        $booking = Booking::find($id);

        $booking->status = $request->input('approve');
        $booking->save();

        Mail::to($booking->email)->send(new BookingConfirmMail($booking));

        return redirect()->route('admin.booking.all')->with('updated', 'Booking updated successfully.');
        
    }

    public function BookingReceipt($id)
    {
        $booking = Booking::find($id);
        return view('dashboard.booking.receipt', compact('booking'));
    }
    
    public function destroy($id)
    {
        Booking::find($id)->delete();
        return redirect()->route('admin.booking.all')
                        ->with('success','Booking deleted successfully');
    }

    public function BookingCancel($id)
    {
        Booking::find($id)->delete();
        return redirect()->route('home.mybooking');
    }

    public function BookingExportXLSX() 
    {
        return Excel::download(new BookingsExport, 'Bookings.xlsx');
    }

    public function BookingExportCSV() 
    {
        return Excel::download(new BookingsExport, 'Bookings.csv');
    }

    public function VenueBookingExportXLSX() 
    {
        return Excel::download(new BookingsExport, 'Bookings.xlsx');
    }

    public function VenueBookingExportCSV() 
    {
        return Excel::download(new BookingsExport, 'Bookings.csv');
    }
}
