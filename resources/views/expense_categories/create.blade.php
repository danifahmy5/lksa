@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Expense Category</h1>
    <form action="{{ route('expense-categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('expense-categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
