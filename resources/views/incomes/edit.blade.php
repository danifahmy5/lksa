@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Income</h1>
    <form action="{{ route('incomes.update', $income->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="donor_id" class="form-label">Donor</label>
            <select name="donor_id" id="donor_id" class="form-control">
                <option value="">-- Select Donor --</option>
                @foreach($donors as $donor)
                    <option value="{{ $donor->id }}" {{ $income->donor_id == $donor->id ? 'selected' : '' }}>{{ $donor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ $income->amount }}" required>
        </div>
        <div class="mb-3">
            <label for="source" class="form-label">Source</label>
            <input type="text" name="source" id="source" class="form-control" value="{{ $income->source }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $income->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $income->date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('incomes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
