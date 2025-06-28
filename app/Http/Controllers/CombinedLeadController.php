<?php

namespace App\Http\Controllers;

use App\Models\CombinedLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CombinedLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // LeadController
    public function index()
    {
        $leads = CombinedLead::all();
        return view('combined_leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salesReps = \App\Models\SalesRep::with('user')->get();
        return view('combined_leads.create', compact('salesReps'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cust_name' => 'required|string|max:255',
            'cust_phone' => 'required|string|max:20',
            'cust_email' => 'required|email|unique:combined_leads,cust_email',
            'communication_method' => 'required|string',
            'target_wedding_date' => 'required|date',
            'budget_range' => 'required|string',
            'guest_count' => 'required|integer|min:0',
            'package_deal' => 'nullable|boolean',
            'catering' => 'nullable|boolean',
            'hair_makeup' => 'nullable|boolean',
            'live_band' => 'nullable|boolean',
            'stage' => 'nullable|string',
            'assigned_rep' => 'nullable|integer|exists:users,id',
            'wedding_date' => 'nullable|date',
            'lead_source' => 'nullable|string',
        ], [
            'cust_email.unique' => "You have already requested a quotation. Kindly wait for a response, we'll be contacting you soon. Thank you!",
        ]);

        // Generate quotation_id
        $date = now()->format('Ymd');
        $count = CombinedLead::count() + 1;
        $quotationId = 'LEAD-' . $date . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);

        CombinedLead::create([
            'quotation_id' => $quotationId,
            'cust_name' => $request->cust_name,
            'cust_phone' => $request->cust_phone,
            'cust_email' => $request->cust_email,
            'communication_method' => $request->communication_method,
            'target_wedding_date' => $request->target_wedding_date,
            'budget_range' => $request->budget_range,
            'guest_count' => $request->guest_count,
            'package_deal' => $request->has('package_deal'),
            'catering' => $request->has('catering'),
            'hair_makeup' => $request->has('hair_makeup'),
            'live_band' => $request->has('live_band'),
            'stage' => $request->stage ?? 'Not Started',
            'assigned_rep' => null,
            'wedding_date' => null,
            'lead_source' => null,
        ]);

        return redirect()->route('combined_leads.index')
            ->with('success', 'Lead created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CombinedLead $combinedLead)
    {
        return view('combined_leads.show', ['lead' => $combinedLead]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CombinedLead $combinedLead)
    {
        $salesReps = \App\Models\SalesRep::with('user')->get();

        return view('combined_leads.edit', compact('combinedLead', 'salesReps'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CombinedLead $combinedLead)
    {
        $request->validate([
            'cust_name' => 'required|string|max:255',
            'cust_phone' => 'required|string|max:20',
            'cust_email' => 'required|email|unique:combined_leads,cust_email,' . $combinedLead->id,
            'communication_method' => 'required|string',
            'target_wedding_date' => 'required|date',
            'budget_range' => 'required|string',
            'guest_count' => 'required|integer|min:0',
            'package_deal' => 'nullable|boolean',
            'catering' => 'nullable|boolean',
            'hair_makeup' => 'nullable|boolean',
            'live_band' => 'nullable|boolean',
            'stage' => 'nullable|string',
            'assigned_rep' => 'nullable|integer|exists:users,id',
            'wedding_date' => 'nullable|date',
            'lead_source' => 'nullable|string',
        ], [
            'cust_email.unique' => 'You have already requested a quotation',
        ]);

        $combinedLead->update($request->all());

        return redirect()->route('combined_leads.index')
            ->with('success', 'Lead updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CombinedLead $combinedLead)
    {
        $combinedLead->delete();

        return redirect()->route('client.dashboard')
            ->with('success', 'Lead deleted successfully.');
    }
}
