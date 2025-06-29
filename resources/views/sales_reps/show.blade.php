@extends('layouts.app')

@include('components.dashboard-style')

@section('content')
<div class="container">
    <h2 class="section-heading">Sales Rep Details</h2>

    <div class="card p-4 card-custom">
        <p><strong>Name:</strong> {{ $salesRep->user->name }}</p>
        <p><strong>Email:</strong> {{ $salesRep->user->email }}</p>

        <div class="mt-3">
            @role('admin')
            <a href="{{ route('sales-reps.edit', $salesRep->id) }}" class="btn btn-outline-primary">Edit</a>
            <form action="{{ route('sales-reps.destroy', $salesRep->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-outline-danger" onclick="return confirm('Delete this sales rep?')">Delete</button>
            </form>
            @endrole

            <a href="{{ route('sales-reps.index') }}" class="btn btn-outline-secondary ms-2">Back to List</a>
        </div>
    </div>
</div>
@endsection
