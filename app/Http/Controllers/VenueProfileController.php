<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class VenueProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        $user = Auth::user();
        $profile = User::where('id',$user->id)->get();
        return view('venuedashboard.profile',compact('user', 'profile'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $request->validate([
            'name' =>'required',
            'email'=>'required',
        ]);

        $user =Auth::user();
        $user->update($request->all());

        return redirect()->route('venue.profile.index')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'currentpassword' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'confirm_password' => ['same:password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

}
