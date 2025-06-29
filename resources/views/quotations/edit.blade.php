@extends('layouts.app')

@push('styles')
    @include('components.dashboard-style')
@endpush

@section('content')
<div class="container">
    <h2 class="section-heading">Edit Quotation</h2>

    @role(['admin', 'sales_rep'])
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('quotations.update', $quotation) }}" method="POST" class="card p-4 card-custom">
            @csrf
            @method('PUT')

            @include('quotations.partials.form', ['quotation' => $quotation])

            <div class="mt-4">
                <a href="{{ route('quotations.index') }}" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="custom-btn">Update</button>
            </div>
        </form>
    @else
        <div class="alert alert-warning">Only admins and sales reps can update quotations.</div>
    @endrole
</div>
@endsection
