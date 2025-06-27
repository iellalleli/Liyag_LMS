<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('client')) {
            $quotations = Quotation::where('user_id', Auth::id())->get();
        } else {
            $quotations = Quotation::all();
        }

        return view('quotations.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quotations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cust_name' => 'required|string|max:255',
            'cust_phone' => 'required|string|max:20',
            'cust_email' => 'required|email',
            'communication_method' => 'required|string',
            'target_wedding_date' => 'required|date',
            'budget_range' => 'required|string',
            'guest_count' => 'required|integer|min:0',
            'package_deal' => 'nullable|boolean',
            'catering' => 'nullable|boolean',
            'hair_makeup' => 'nullable|boolean',
            'live_band' => 'nullable|boolean',
        ]);

        // Generate quotation_id
        $date = now()->format('Ymd');
        $count = Quotation::count() + 1;
        $quotationId = 'QUO-' . $date . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);

        $quotation = Quotation::create([
            'quotation_id' => $quotationId,
            'cust_name' => $request->cust_name,
            'cust_phone' => $request->cust_phone,
            'cust_email' => $request->cust_email,
            'communication_method' => $request->communication_method,
            'target_wedding_date' => $request->target_wedding_date,
            'budget_range' => $request->budget_range,
            'guest_count' => $request->guest_count,
            'package_deal' => $request->package_deal ?? false,
            'catering' => $request->catering ?? false,
            'hair_makeup' => $request->hair_makeup ?? false,
            'live_band' => $request->live_band ?? false,
            'user_id' => Auth::id(), // Track the owner of the quotation
        ]);

        return redirect()->route('quotations.index')
            ->with('success', 'Quotation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quotation $quotation)
    {
        if (Auth::user()->hasRole('client') && $quotation->user_id !== Auth::id()) {
            abort(403);
        }

        return view('quotations.show', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quotation $quotation)
    {
        if (Auth::user()->hasRole('client') && $quotation->user_id !== Auth::id()) {
            abort(403);
        }

        return view('quotations.edit', compact('quotation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotation $quotation)
    {
        if (Auth::user()->hasRole('client') && $quotation->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'cust_name' => 'required|string|max:255',
            'cust_phone' => 'required|string|max:20',
            'cust_email' => 'required|email',
            'communication_method' => 'required|string',
            'target_wedding_date' => 'required|date',
            'budget_range' => 'required|string',
            'guest_count' => 'required|integer|min:0',
            'package_deal' => 'nullable|boolean',
            'catering' => 'nullable|boolean',
            'hair_makeup' => 'nullable|boolean',
            'live_band' => 'nullable|boolean',
        ]);

        $quotation->update($request->all());

        return redirect()->route('quotations.index')
            ->with('success', 'Quotation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotation $quotation)
    {
        if (Auth::user()->hasRole('client') && $quotation->user_id !== Auth::id()) {
            abort(403);
        }

        $quotation->delete();
        return redirect()->route('quotations.index')
            ->with('success', 'Quotation deleted successfully.');
    }
}
