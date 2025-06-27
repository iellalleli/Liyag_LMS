@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inquiries</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @role('client')
        <a href="{{ route('inquiries.create') }}" class="btn btn-success mb-3">Send Inquiry</a>
    @endrole

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Client</th>
                <th>Vendor</th>
                <th>Message</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->user->name }}</td>
                    <td>{{ $inquiry->vendor->business_name }}</td>
                    <td>{{ $inquiry->message }}</td>
                    <td>{{ $inquiry->status }}</td>
                    <td>
                        <a href="{{ route('inquiries.show', $inquiry->id) }}" class="btn btn-info btn-sm">View</a>

                        @role(['admin', 'vendor'])
                            <a href="{{ route('inquiries.edit', $inquiry->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('inquiries.destroy', $inquiry->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this inquiry?')">Delete</button>
                            </form>
                        @endrole
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
