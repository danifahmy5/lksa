@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Expenses</h1>
    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Add Expense</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->category?->name }}</td>
                <td>{{ $expense->amount }}</td>
                <td>{{ $expense->description }}</td>
                <td>{{ $expense->date }}</td>
                <td>
                    <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('expenses.destroy', $expense) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $expenses->links() }}
</div>
@endsection
