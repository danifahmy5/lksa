@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Cash Flows</h1>
    <a href="{{ route('cash-flows.create') }}" class="btn btn-primary mb-3">Add Cash Flow</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bank</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cashFlows as $cashFlow)
                <tr>
                    <td>{{ $cashFlow->id }}</td>
                    <td>{{ $cashFlow->bank->name ?? '-' }}</td>
                    <td>{{ ucfirst($cashFlow->type) }}</td>
                    <td>{{ number_format($cashFlow->amount, 2) }}</td>
                    <td>{{ $cashFlow->description }}</td>
                    <td>{{ $cashFlow->date }}</td>
                    <td>
                        <a href="{{ route('cash-flows.edit', $cashFlow) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('cash-flows.destroy', $cashFlow) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cashFlows->links() }}
</div>
@endsection
