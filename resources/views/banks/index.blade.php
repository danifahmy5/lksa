@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Banks</h1>
    <a href="{{ route('banks.create') }}" class="btn btn-primary mb-3">Add Bank</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banks as $bank)
                <tr>
                    <td>{{ $bank->id }}</td>
                    <td>{{ $bank->name }}</td>
                    <td>{{ $bank->account_number }}</td>
                    <td>{{ number_format($bank->balance, 2) }}</td>
                    <td>
                        <a href="{{ route('banks.edit', $bank) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('banks.destroy', $bank) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
