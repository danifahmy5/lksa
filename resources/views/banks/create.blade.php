@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Bank</h1>
    <form action="{{ route('banks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="account_number" class="form-label">Account Number</label>
            <input type="text" name="account_number" class="form-control" value="{{ old('account_number') }}">
            @error('account_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="balance" class="form-label">Balance</label>
            <input type="number" step="0.01" name="balance" class="form-control" value="{{ old('balance', 0) }}" required>
            @error('balance')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('banks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
