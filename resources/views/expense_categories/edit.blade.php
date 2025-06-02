@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Expense Category</h1>
    <form action="{{ route('expense-categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('expense-categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
