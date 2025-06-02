@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Cash Flow</h1>
    <form action="{{ route('cash-flows.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="bank_id" class="form-label">Bank</label>
            <select name="bank_id" id="bank_id" class="form-control" required>
                <option value="">Select Bank</option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="in">In</option>
                <option value="out">Out</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('cash-flows.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
