<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CombinedLead;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $lead = CombinedLead::where('cust_email', Auth::user()->email)->first();

        return view('dashboards.client', compact('lead'));
    }
}
