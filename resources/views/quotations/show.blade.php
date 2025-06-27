@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Quotation Details</h2>

    <p><strong>Quotation ID:</strong> {{ $quotation->quotation_id }}</p>
    <p><strong>Name:</strong> {{ $quotation->cust_name }}</p>
    <p><strong>Email:</strong> {{ $quotation->cust_email }}</p>
    <p><strong>Phone:</strong> {{ $quotation->cust_phone }}</p>
    <p><strong>Communication Method:</strong> {{ $quotation->communication_method }}</p>
    <p><strong>Wedding Date:</strong> {{ $quotation->target_wedding_date }}</p>
    <p><strong>Budget:</strong> {{ $quotation->budget_range }}</p>
    <p><strong>Guest Count:</strong> {{ $quotation->guest_count }}</p>

    <p><strong>Services:</strong></p>
    <ul>
        <li>Package Deal: {{ $quotation->package_deal ? 'Yes' : 'No' }}</li>
        <li>Catering: {{ $quotation->catering ? 'Yes' : 'No' }}</li>
        <li>Hair & Makeup: {{ $quotation->hair_makeup ? 'Yes' : 'No' }}</li>
        <li>Live Band: {{ $quotation->live_band ? 'Yes' : 'No' }}</li>
    </ul>

    @role(['admin', 'sales_rep'])
        <a href="{{ route('quotations.edit', $quotation) }}" class="btn btn-warning">Edit</a>
    @endrole
    <a href="{{ route('quotations.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
