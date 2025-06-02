@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Income Detail</h1>
    <div class="mb-3">
        <strong>ID:</strong> {{ $income->id }}
    </div>
    <div class="mb-3">
        <strong>Donor:</strong> {{ $income->donor?->name ?? '-' }}
    </div>
    <div class="mb-3">
        <strong>Amount:</strong> {{ number_format($income->amount, 2) }}
    </div>
    <div class="mb-3">
        <strong>Source:</strong> {{ $income->source }}
    </div>
    <div class="mb-3">
        <strong>Description:</strong> {{ $income->description }}
    </div>
    <div class="mb-3">
        <strong>Date:</strong> {{ $income->date }}
    </div>
    <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <a href="{{ route('incomes.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
