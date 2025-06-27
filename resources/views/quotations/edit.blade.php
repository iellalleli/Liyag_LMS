@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Quotation</h2>

    @role(['admin', 'sales_rep'])
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('quotations.update', $quotation) }}" method="POST">
            @csrf
            @method('PUT')

            @include('quotations.partials.form', ['quotation' => $quotation])

            <a href="{{ route('quotations.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @else
        <div class="alert alert-warning">Only admins and sales reps can update quotations.</div>
    @endrole
</div>
@endsection
