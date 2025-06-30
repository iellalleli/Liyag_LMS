@extends('layouts.app')

@include('components.dashboard-style')

@section('content')
<div class="container">
    <h2 class="section-heading">Edit Sales Representative</h2>

    <form action="{{ route('sales-reps.update', $salesRep->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('sales_reps.partials.form', ['salesRep' => $salesRep])
    </form>
</div>
@endsection
