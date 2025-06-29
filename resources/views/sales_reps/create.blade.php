@extends('layouts.app')

@include('components.dashboard-style')

@section('content')
<div class="container">
    <h2 class="section-heading">Add Sales Representative</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('sales-reps.store') }}" method="POST">
        @csrf
        @include('sales_reps.partials.form')
    </form>
</div>
@endsection
