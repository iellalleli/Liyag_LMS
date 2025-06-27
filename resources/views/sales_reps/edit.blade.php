@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Sales Rep</h2>

    <form action="{{ route('sales-reps.update', $salesRep->id) }}" method="POST">
        @csrf @method('PUT')
        @include('sales_reps.partials.form', ['salesRep' => $salesRep])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sales-reps.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
