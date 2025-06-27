<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index()
    {
        $unassignedQuotations = collect();

        if (Auth::user()->hasRole('admin')) {
            $leads = Lead::with(['quotation', 'assignedRep'])->get();
            $unassignedQuotations = Quotation::whereNotIn('id', Lead::pluck('quotation_id'))->get();
        } elseif (Auth::user()->hasRole('sales_rep')) {
            $leads = Lead::with(['quotation', 'assignedRep'])
                ->where('assigned_rep', Auth::id())
                ->get();
        } else {
            abort(403, 'You are not allowed to access this resource.');
        }

        return view('leads.index', compact('leads', 'unassignedQuotations'));
    }

    public function create()
    {
        if (!Auth::user()->hasAnyRole(['admin', 'sales_rep'])) {
            abort(403);
        }

        $quotations = Quotation::whereNotIn('id', Lead::pluck('quotation_id'))->get();
        $salesReps = User::role('sales_rep')->get();

        return view('leads.create', compact('quotations', 'salesReps'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasAnyRole(['admin', 'sales_rep'])) {
            abort(403);
        }

        $validated = $request->validate([
            'quotation_id' => 'required|exists:quotations,id',
            'stage' => 'required|string',
            'assigned_rep' => 'required|exists:users,id',
            'wedding_date' => 'required|date',
            'lead_source' => 'required|string',
        ]);

        Lead::create($validated);

        return redirect()->route('leads.index')->with('success', 'Lead created successfully.');
    }

    public function show(Lead $lead)
    {
        if (Auth::user()->hasRole('admin') || Auth::id() == $lead->assigned_rep) {
            return view('leads.show', compact('lead'));
        }

        abort(403);
    }

    public function edit(Lead $lead)
    {
        if (!Auth::user()->hasAnyRole(['admin', 'sales_rep'])) {
            abort(403);
        }

        if (Auth::user()->hasRole('sales_rep') && Auth::id() !== $lead->assigned_rep) {
            abort(403);
        }

        $quotations = Quotation::all();
        $salesReps = User::role('sales_rep')->get();

        return view('leads.edit', compact('lead', 'quotations', 'salesReps'));
    }

    public function update(Request $request, Lead $lead)
    {
        if (!Auth::user()->hasAnyRole(['admin', 'sales_rep'])) {
            abort(403);
        }

        if (Auth::user()->hasRole('sales_rep') && Auth::id() !== $lead->assigned_rep) {
            abort(403);
        }

        $validated = $request->validate([
            'quotation_id' => 'required|exists:quotations,id',
            'stage' => 'required|string',
            'assigned_rep' => 'required|exists:users,id',
            'wedding_date' => 'required|date',
            'lead_source' => 'required|string',
        ]);

        $lead->update($validated);

        return redirect()->route('leads.index')->with('success', 'Lead updated successfully.');
    }

    public function destroy(Lead $lead)
    {
        if (!Auth::user()->hasAnyRole(['admin', 'sales_rep'])) {
            abort(403);
        }

        if (Auth::user()->hasRole('sales_rep') && Auth::id() !== $lead->assigned_rep) {
            abort(403);
        }

        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully.');
    }
}
