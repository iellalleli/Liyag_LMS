@extends('layouts.app')

@push('styles')
    @include('components.dashboard-style')
@endpush

@section('content')
<div class="container">
    <h2 class="section-heading">Quotations</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @role(['admin', 'sales_rep', 'client'])
        <a href="{{ route('quotations.create') }}" class="custom-btn mb-3">Add New Quotation</a>
    @endrole

    <table class="table table-bordered table-striped card-custom">
        <thead class="table-light">
            <tr>
                <th>Quotation ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Budget</th>
                <th>Wedding Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotations as $quotation)
                <tr>
                    <td>{{ $quotation->quotation_id }}</td>
                    <td>{{ $quotation->cust_name }}</td>
                    <td>{{ $quotation->cust_email }}</td>
                    <td>{{ $quotation->budget_range }}</td>
                    <td>{{ $quotation->target_wedding_date }}</td>
                    <td>
                        <a href="{{ route('quotations.show', $quotation) }}" class="btn btn-sm btn-outline-info">View</a>

                        @role(['admin', 'sales_rep'])
                            <a href="{{ route('quotations.edit', $quotation) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('quotations.destroy', $quotation) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        @endrole
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
