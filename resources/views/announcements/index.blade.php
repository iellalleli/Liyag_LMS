@php use Illuminate\Support\Facades\Auth; @endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Announcements</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @role('admin')
        <a href="{{ route('announcements.create') }}" class="btn btn-success mb-3">Add New Announcement</a>
    @endrole

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('announcements.show', $announcement) }}" class="btn btn-info btn-sm">View</a>

                        @role('admin')
                            <a href="{{ route('announcements.edit', $announcement) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('announcements.destroy', $announcement) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this?')">Delete</button>
                            </form>
                        @endrole
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
