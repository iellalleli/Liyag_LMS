<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\SalesRep;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::with(['user', 'vendor'])->latest()->get();
        return view('inquiries.index', compact('inquiries'));
    }

    public function create()
    {
        $vendors = SalesRep::all();
        return view('inquiries.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required|exists:sales_reps,id',
            'message' => 'required|string',
        ]);

        Inquiry::create([
            'user_id' => auth()->id(),
            'vendor_id' => $request->vendor_id,
            'message' => $request->message,
            'status' => 'Pending',
        ]);

        return redirect()->route('inquiries.index')->with('success', 'Inquiry sent successfully.');
    }

    public function show(Inquiry $inquiry)
    {
        return view('inquiries.show', compact('inquiry'));
    }

    public function edit(Inquiry $inquiry)
    {
        return view('inquiries.edit', compact('inquiry'));
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $inquiry->update([
            'status' => $request->status,
        ]);

        return redirect()->route('inquiries.index')->with('success', 'Inquiry updated.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('inquiries.index')->with('success', 'Inquiry deleted.');
    }
}
