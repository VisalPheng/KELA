<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQs;

class FAQController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $faqs = FAQs::orderBy('id','DESC')->paginate(6);
        return view('dashboard.faq.index')->with(["faqs"=>$faqs]);
    }

    public function create()
    {
        return view('dashboard.faq.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $faq = $request->all();
    
        $faq = FAQs::create($faq);

        return redirect()->route('admin.faqs.index')
        ->with('success','F.A.Q created successfully');
    }

    public function edit($id)
    {
        $faq = FAQs::find($id);
        return view('dashboard.faq.edit', ['faq' => $faq]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $faq = FAQs::find($id);

        $faq->name = $request->input('name');
        $faq->description = $request->input('description');
        $faq->status = $request->input('approve');
        $faq->save();

        return redirect()->route('admin.faqs.index')->with('updated', 'F.A.Q updated successfully.');
    }

    public function destroy($id)
    {
        FAQs::find($id)->delete();
        return redirect()->route('admin.faqs.index')->with('deleted','F.A.Q deleted successfully');
    }
}
