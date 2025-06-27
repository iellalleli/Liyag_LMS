@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Lead</h2>

    @include('components.validation-errors')

    <form method="POST" action="{{ route('leads.store') }}">
        @include('leads.partials.form')
        <button class="btn btn-primary">Save Lead</button>
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
