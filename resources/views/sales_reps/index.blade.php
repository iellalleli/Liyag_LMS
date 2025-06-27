@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sales Representatives</h2>

    @role('admin')
        <a href="{{ route('sales-reps.create') }}" class="btn btn-success mb-3">Add New Sales Rep</a>
    @endrole

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Leads Assigned</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesReps as $rep)
                <tr>
                    <td>{{ $rep->user->name }}</td>
                    <td>{{ $rep->user->email }}</td>
                    <td>{{ $rep->no_of_leads_assigned }}</td>
                    <td>
                        <a href="{{ route('sales-reps.show', $rep->id) }}" class="btn btn-info btn-sm">View</a>

                        @role('admin')
                            <a href="{{ route('sales-reps.edit', $rep->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('sales-reps.destroy', $rep->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this rep?')">Delete</button>
                            </form>
                        @endrole
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
