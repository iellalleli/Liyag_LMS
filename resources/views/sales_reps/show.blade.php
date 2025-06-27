@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sales Rep Details</h2>

    <p><strong>Name:</strong> {{ $salesRep->user->name }}</p>
    <p><strong>Email:</strong> {{ $salesRep->user->email }}</p>
    <p><strong>Leads Assigned:</strong> {{ $salesRep->no_of_leads_assigned }}</p>

    @role('admin')
        <a href="{{ route('sales-reps.edit', $salesRep->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('sales-reps.destroy', $salesRep->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Delete this rep?')">Delete</button>
        </form>
    @endrole

    <a href="{{ route('sales-reps.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
