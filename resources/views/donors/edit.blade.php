@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Donor</h1>
    <form action="{{ route('donors.update', $donor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $donor->name }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $donor->phone }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control">{{ $donor->address }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('donors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
