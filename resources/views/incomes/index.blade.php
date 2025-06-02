@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Income List</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('incomes.create') }}" class="btn btn-primary mb-3">Add Income</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Donor</th>
                <th>Amount</th>
                <th>Source</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incomes as $income)
                <tr>
                    <td>{{ $income->id }}</td>
                    <td>{{ $income->donor?->name ?? '-' }}</td>
                    <td>{{ number_format($income->amount, 2) }}</td>
                    <td>{{ $income->source }}</td>
                    <td>{{ $income->description }}</td>
                    <td>{{ $income->date }}</td>
                    <td>
                        <a href="{{ route('incomes.show', $income->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
