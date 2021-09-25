<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\User;
use App\Models\Locations;
use App\Models\TimeSlots;
use App\Models\Booking;
use App\Models\EventsandOffers;
use App\Models\Partners;
use App\Models\FAQs;
use Auth;

class HomeController extends Controller
{
    public function home()
    {
        $allvenues = Venue::inRandomOrder()->where('status', 1)->paginate(6);
        $eventsandoffers = EventsandOffers::inRandomOrder()->where('status', 1)->paginate(3);
        $partners = Partners::orderBy('id','ASC')->where('status', 1)->get();
        $faqs = FAQs::orderBy('id','ASC')->where('status', 1)->get();
        return view('frontend.venue',compact('allvenues','eventsandoffers','partners','faqs'));
    }

    public function venues()
    {
        $alllocations = Locations::all();
        $allvenues = Venue::inRandomOrder()->where('status', 1)->get();
        return view('frontend.allvenues',["allvenues"=>$allvenues],["alllocations"=>$alllocations]);
    }

    public function sortLocation($id)
    {
        $alllocations = Locations::all();
        $location = Locations::findOrFail($id);
        $allvenues = Venue::where('location_id', $location->id)->inRandomOrder()->where('status', 1)->get();
        return view('frontend.allvenues',["allvenues"=>$allvenues],["alllocations"=>$alllocations]);
    }

    public function detailpage($id, Venue $venue)
    {
        $venue = Venue::findOrFail($id);
        $images = json_decode($venue->multiple_img,true);
        $timeslots = TimeSlots::where('venue_id', $venue->id)->where('status', 1)->orderBy('id','ASC')->get();
        return view('frontend.detailpage', compact('venue','images','timeslots'));
    }

    public function eventandoffer($id)
    {
        $eventandoffer = EventsAndOffers::findorFail($id);
        return view('frontend.eventandoffer', compact('eventandoffer'));
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $venues = Venue::where('name','LIKE', '%'.$search_text.'%')->where('status', 1)->get();

        return view('frontend.searchresult', compact('venues'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.register');
    }

    public function registerconfirmation()
    {
        return view('auth.registerconfirmation');
    }
}
