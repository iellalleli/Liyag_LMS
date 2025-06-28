@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lead Details</h2>

        <div class="card shadow-sm p-4">

            <p><strong>Quotation ID:</strong> {{ $lead->id ?? 'N/A' }}</p>
            <p><strong>Customer:</strong> {{ $lead->cust_name ?? 'N/A' }}</p>
            <p><strong>Customer Phone:</strong> {{ $lead->cust_phone ?? 'N/A' }}</p>
            <p><strong>Customer Email:</strong> {{ $lead->cust_email ?? 'N/A' }}</p>
            <p><strong>Communication Method:</strong> {{ $lead->communication_method ?? 'N/A' }}</p>
            <p><strong>Target Wedding Date:</strong>
                {{ $lead->target_wedding_date
        ? \Carbon\Carbon::parse($lead->target_wedding_date)->format('F d, Y')
        : 'N/A' }}
            </p>
            <p><strong>Wedding Date:</strong>
                {{ $lead->wedding_date
        ? \Carbon\Carbon::parse($lead->wedding_date)->format('F d, Y')
        : 'N/A' }}
            </p>
            <p><strong>Budget Range:</strong> {{ $lead->budget_range ?? 'N/A' }}</p>
            <p><strong>Guest Count:</strong> {{ $lead->guest_count ?? 'N/A' }}</p>
            <p><strong>Package Deal:</strong>
                {{ $lead->package_deal === 1 ? 'Yes' : ($lead->package_deal === 0 ? 'No' : 'N/A') }}
            </p>

            <p><strong>Catering:</strong>
                {{ $lead->catering === 1 ? 'Yes' : ($lead->catering === 0 ? 'No' : 'N/A') }}
            </p>

            <p><strong>Hair & Makeup:</strong>
                {{ $lead->hair_makeup === 1 ? 'Yes' : ($lead->hair_makeup === 0 ? 'No' : 'N/A') }}
            </p>

            <p><strong>Live Band:</strong>
                {{ $lead->live_band === 1 ? 'Yes' : ($lead->live_band === 0 ? 'No' : 'N/A') }}
            </p>

            <p><strong>Stage:</strong> {{ $lead->stage ?? 'N/A' }}</p>
            <p><strong>Lead Source:</strong> {{ $lead->lead_source ?? 'N/A' }}</p>
            <p><strong>Sales Rep:</strong> {{ $lead->assignedRep->name ?? 'N/A' }}</p>

            <div class="mt-3">
                @role(['admin', 'sales_rep'])
                <a href="{{ route('combined_leads.edit', $lead->id) }}" class="btn btn-warning">Edit</a>
                @endrole
                <a href="{{ route('combined_leads.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection