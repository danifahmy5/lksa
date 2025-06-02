@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Donor Details</h1>
    <div class="mb-3">
        <strong>Name:</strong> {{ $donor->name }}
    </div>
    <div class="mb-3">
        <strong>Phone:</strong> {{ $donor->phone }}
    </div>
    <div class="mb-3">
        <strong>Address:</strong> {{ $donor->address }}
    </div>
    <a href="{{ route('donors.edit', $donor) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('donors.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
