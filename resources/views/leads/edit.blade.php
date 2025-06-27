@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Lead</h2>

    @include('components.validation-errors')

    <form method="POST" action="{{ route('leads.update', $lead->id) }}">
        @csrf @method('PUT')
        @include('leads.partials.form')
        <button class="btn btn-primary">Update Lead</button>
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
