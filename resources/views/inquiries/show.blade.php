@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inquiry Details</h2>

    <p><strong>Client:</strong> {{ $inquiry->user->name }}</p>
    <p><strong>Vendor:</strong> {{ $inquiry->vendor->business_name }}</p>
    <p><strong>Message:</strong><br>{{ $inquiry->message }}</p>
    <p><strong>Status:</strong> {{ $inquiry->status }}</p>

    @role(['admin', 'vendor'])
        <a href="{{ route('inquiries.edit', $inquiry->id) }}" class="btn btn-warning">Edit</a>
    @endrole

    <a href="{{ route('inquiries.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
