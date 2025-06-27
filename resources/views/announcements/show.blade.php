@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $announcement->title }}</h2>
    <p>{{ $announcement->content }}</p>
    <p><strong>Posted at:</strong> {{ $announcement->created_at->format('F j, Y h:i A') }}</p>

    @role('admin')
        <a href="{{ route('announcements.edit', $announcement) }}" class="btn btn-warning">Edit</a>
    @endrole

    <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
