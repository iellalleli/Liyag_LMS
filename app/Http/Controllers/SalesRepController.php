<?php

namespace App\Http\Controllers;

use App\Models\SalesRep;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesRepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('sales_rep')) {
            $salesReps = SalesRep::with('user')->where('user_id', Auth::id())->get();
        } else {
            $salesReps = SalesRep::with('user')->get();
        }

        return view('sales_reps.index', compact('salesReps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('sales_rep')->get();
        return view('sales_reps.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:sales_reps,user_id',
        ]);

        SalesRep::create([
            'user_id' => $request->user_id,
            'leads_assigned_to' => 0,
        ]);

        return redirect()->route('sales-reps.index')->with('success', 'Sales rep profile created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesRep $salesRep)
    {
        if (Auth::user()->hasRole('sales_rep') && Auth::id() !== $salesRep->user_id) {
            abort(403, 'Unauthorized access.');
        }

        return view('sales_reps.show', compact('salesRep'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesRep $salesRep)
    {
        if (Auth::user()->hasRole('sales_rep') && Auth::id() !== $salesRep->user_id) {
            abort(403, 'Unauthorized access.');
        }

        $users = User::role('sales_rep')->get();
        return view('sales_reps.edit', compact('salesRep', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesRep $salesRep)
    {
        if (Auth::user()->hasRole('sales_rep') && Auth::id() !== $salesRep->user_id) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id|unique:sales_reps,user_id,' . $salesRep->id,
        ]);

        $salesRep->update([
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('sales-reps.index')->with('success', 'Sales rep updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesRep $salesRep)
    {
        if (Auth::user()->hasRole('sales_rep') && Auth::id() !== $salesRep->user_id) {
            abort(403, 'Unauthorized access.');
        }

        $salesRep->delete();
        return redirect()->route('sales-reps.index')->with('success', 'Sales rep deleted successfully!');
    }
}
