@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lead Details</h2>

    <div class="card shadow-sm p-4">
        <p><strong>Quotation ID:</strong> {{ $lead->quotation->quotation_id }}</p>
        <p><strong>Customer:</strong> {{ $lead->quotation->cust_name }}</p>
        <p><strong>Stage:</strong> {{ $lead->stage }}</p>
        <p><strong>Sales Rep:</strong> {{ $lead->assignedRep->name ?? 'N/A' }}</p>
        <p><strong>Wedding Date:</strong> {{ \Carbon\Carbon::parse($lead->wedding_date)->format('F d, Y') }}</p>
        <p><strong>Lead Source:</strong> {{ $lead->lead_source }}</p>

        <div class="mt-3">
            @role(['admin', 'sales_rep'])
                <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-warning">Edit</a>
            @endrole
            <a href="{{ route('leads.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
