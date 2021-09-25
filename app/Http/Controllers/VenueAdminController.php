<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locations;
use App\Models\Venue;
use Auth;

class VenueAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        $venues = Venue::orderBy('id','DESC')->paginate(5);
        return view('dashboard.venue.index')->with(['venues' => $venues]);
    }

    public function create()
    {
        $locations = Locations::all();
        return view('dashboard.venue.create', ['locations' => $locations]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'phonenumber' => 'required'
        ]);

        $img = $request->file('img_url');
        $img_name = time().'.'.$img->extension();
        $request->file('img_url')->move(public_path('images'),$img_name);

        $request['user_id']=Auth::id();
    
        foreach($request->file('file') as $image)
        {
            $imageName=$image->getClientOriginalName();
            $image->move(public_path().'/images/', $imageName);  
            $fileNames[] = $imageName;
        }

        $images = json_encode($fileNames);

        $venue = $request->toArray();
        $venue['img_url'] = $img_name;
        $venue['multiple_img'] = $images;
        Venue::create($venue);
    
        return redirect()->route('admin.venues.index')
                        ->with('success','Venue created successfully');
    }

    public function edit($id)
    {
        $venue = Venue::find($id);
        return view('dashboard.venue.edit', ['venue' => $venue]);
    }

    public function show(Venue $venue)
    {
        $images = json_decode($venue->multiple_img,true);
        return view('dashboard.venue.show', ["venue"=>$venue], ["images"=>$images] );
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'phonenumber' => 'required',
        ]);

        $venue = Venue::find($id);

        $venue->name = $request->input('name');
        $venue->description = $request->input('description');
        $venue->address = $request->input('address');
        $venue->phonenumber = $request->input('phonenumber');
        $venue->status = $request->input('approve');

        if($request->hasfile('img_url')) {
            $img = $request->file('img_url');
            $extension = $img->getClientOriginalExtension();
            $img_name = time().'.'.$img->extension();
            $img->move(public_path('images'),$img_name);

            if($request->hasfile('multiple_img')) {
            foreach($request->file('file') as $image)
            {
                $imageName=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $imageName);  
                $fileNames[] = $imageName;
            }
    
            $images = json_encode($fileNames);
            $venues['multiple_img'] = $images;
            }

            $venue->img_url = $img;
            $venues = $request->toArray();
            $venues['img_url'] = $img_name;
            $venue->update($venues);
        }


        $venue->save();
        

        return redirect()->route('admin.venues.index')->with('updated', 'Venue updated successfully.');
    }
    public function destroy($id)
    {
        Venue::find($id)->delete();
        return redirect()->route('admin.venues.index')
                        ->with('deleted','Venue deleted successfully');
    }
}
