@extends('layouts.app')

@push('styles')
<style>
    .section-heading {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: #6F4E37;
        margin-bottom: 1.5rem;
        text-shadow: 0 2px 4px rgba(111, 78, 55, 0.15);
    }

    .card-custom {
        border: 1px solid #f3e8e1;
        border-radius: 16px;
        background-color: #fffdfc;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.04);
        padding: 2rem;
    }

    .card-custom p {
        margin-bottom: 0.7rem;
        font-size: 0.95rem;
        color: #4b2e2e;
    }

    .btn-outline-secondary {
        border-radius: 20px;
        font-weight: 500;
        padding: 0.45rem 1.2rem;
        border-color: #c7b8ae;
        color: #6F4E37;
    }

    .btn-outline-secondary:hover {
        background-color: #ece4dc;
        color: #4b2e2e;
    }

    .btn-warning {
        border-radius: 20px;
        font-weight: 500;
        padding: 0.45rem 1.2rem;
    }

    .action-buttons a {
        margin-right: 0.5rem;
    }
</style>
@endpush

@section('content')
<div class="container">
    <h2 class="section-heading">Lead Details</h2>

    <div class="card card-custom">

        <p><strong>Quotation ID:</strong> {{ $lead->id ?? 'N/A' }}</p>
        <p><strong>Customer:</strong> {{ $lead->cust_name ?? 'N/A' }}</p>
        <p><strong>Customer Phone:</strong> {{ $lead->cust_phone ?? 'N/A' }}</p>
        <p><strong>Customer Email:</strong> {{ $lead->cust_email ?? 'N/A' }}</p>
        <p><strong>Communication Method:</strong> {{ $lead->communication_method ?? 'N/A' }}</p>
        <p><strong>Target Wedding Date:</strong>
            {{ $lead->target_wedding_date ? \Carbon\Carbon::parse($lead->target_wedding_date)->format('F d, Y') : 'N/A' }}
        </p>
        <p><strong>Wedding Date:</strong>
            {{ $lead->wedding_date ? \Carbon\Carbon::parse($lead->wedding_date)->format('F d, Y') : 'N/A' }}
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

        <div class="mt-4 action-buttons">
            @role(['admin', 'sales_rep'])
                <a href="{{ route('combined_leads.edit', $lead->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('combined_leads.index') }}" class="btn btn-outline-secondary">Back to Leads</a>
            @elseif(auth()->user()->hasRole('client'))
                <a href="{{ route('client.dashboard') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
            @endrole
        </div>
    </div>
</div>
@endsection
