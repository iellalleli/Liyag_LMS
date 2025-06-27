@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Send Inquiry</h2>

    @role('client')
        @if ($errors->any())
            <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('inquiries.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="vendor_id" class="form-label">Vendor</label>
                <select name="vendor_id" class="form-control" required>
                    <option value="">-- Select Vendor --</option>
                    @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->id }}">{{ $vendor->business_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea name="message" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
            <a href="{{ route('inquiries.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    @else
        <div class="alert alert-warning">Only clients can send inquiries.</div>
    @endrole
</div>
@endsection
