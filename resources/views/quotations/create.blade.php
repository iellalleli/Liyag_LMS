@extends('layouts.app')

@push('styles')
    @include('components.dashboard-style')
@endpush

@section('content')
<div class="container">
    <h2 class="section-heading">Create Quotation</h2>

    @role(['admin', 'sales_rep', 'client'])
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('client.combined_leads.store') }}" method="POST" class="card p-4 card-custom">
            @csrf

            @include('quotations.partials.form')

            <div class="mt-4">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="custom-btn">Submit</button>
            </div>
        </form>
    @else
        <div class="alert alert-warning">You don't have permission to submit a quotation.</div>
    @endrole
</div>
@endsection
