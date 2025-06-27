@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Sales Rep</h2>

    @if ($errors->any())
        <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form action="{{ route('sales-reps.store') }}" method="POST">
        @csrf
        @include('sales_reps.partials.form')
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('sales-reps.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
