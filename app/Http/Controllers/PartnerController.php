<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partners;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $partners = Partners::orderBy('id','DESC')->paginate(6);
        return view('dashboard.partners.index')->with(["partners"=>$partners]);
    }

    public function create()
    {
        return view('dashboard.partners.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'img_url' => 'required',
        ]);

        $img = $request->file('img_url');
        $img_name = time().'.'.$img->extension();
        $request->file('img_url')->move(public_path('images'),$img_name);
        $partner = $request->toArray();
        $partner['img_url'] = $img_name;
        Partners::create($partner);

        return redirect()->route('admin.partners.index')
        ->with('success','Partners created successfully');
    }

    public function edit($id)
    {
        $partner = Partners::find($id);
        return view('dashboard.partners.edit', ['partner' => $partner]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $partner = Partners::find($id);

        $partner->name = $request->input('name');
        $partner->status = $request->input('approve');

        if($request->hasfile('img_url')) {
            $img = $request->file('img_url');
            $extension = $img->getClientOriginalExtension();
            $img_name = time().'.'.$img->extension();
            $img->move(public_path('images'),$img_name);
            $partner->img_url = $img;
            $partners = $request->toArray();
            $partners['img_url'] = $img_name;
            $partner->update($partners);
        }
        $partner->save();

        return redirect()->route('admin.partners.index')->with('updated', 'Partners updated successfully.');
    }

    public function destroy($id)
    {
        Partners::find($id)->delete();
        return redirect()->route('admin.partners.index')->with('deleted','Partners deleted successfully');
    }
}
