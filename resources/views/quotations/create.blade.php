@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Quotation</h2>

    @role(['admin', 'sales_rep', 'client'])
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('quotations.store') }}" method="POST">
            @csrf

            @include('quotations.partials.form')

            <a href="{{ route('quotations.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        <div class="alert alert-warning">You don't have permission to submit a quotation.</div>
    @endrole
</div>
@endsection
