<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{

    public function index()
    {
        $messages = ContactUs::orderBy('id','DESC')->paginate(6);
        return view('dashboard.contactus.index')->with(["messages"=>$messages]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'message' => 'required',
        ]);
    
        $contactus = $request->all();
    
        $contactus = ContactUs::create($contactus);

        return redirect()->route('home.venue')->with('success','Your message has been sent successfully!');
    }

    public function destroy($id)
    {
        ContactUs::find($id)->delete();
        return redirect()->route('admin.contactus.index')->with('deleted','Message deleted successfully');
    }
}
