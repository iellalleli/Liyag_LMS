@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task Details</h2>

    <p><strong>User:</strong> {{ $checklist->user->name }}</p>
    <p><strong>Task:</strong> {{ $checklist->task }}</p>
    <p><strong>Status:</strong> {{ $checklist->is_completed ? 'Completed' : 'Pending' }}</p>

    @role(['admin', 'sales_rep'])
        <a href="{{ route('checklists.edit', $checklist->id) }}" class="btn btn-warning">Edit</a>
    @endrole

    <a href="{{ route('checklists.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
