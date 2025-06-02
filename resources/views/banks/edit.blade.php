@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Bank</h1>
    <form action="{{ route('banks.update', $bank) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $bank->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="account_number" class="form-label">Account Number</label>
            <input type="text" name="account_number" class="form-control" value="{{ old('account_number', $bank->account_number) }}">
            @error('account_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="balance" class="form-label">Balance</label>
            <input type="number" step="0.01" name="balance" class="form-control" value="{{ old('balance', $bank->balance) }}" required>
            @error('balance')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('banks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
