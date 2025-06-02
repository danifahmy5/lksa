@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Donors</h1>
    <a href="{{ route('donors.create') }}" class="btn btn-primary mb-3">Add Donor</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donors as $donor)
            <tr>
                <td>{{ $donor->id }}</td>
                <td>{{ $donor->name }}</td>
                <td>{{ $donor->phone }}</td>
                <td>{{ $donor->address }}</td>
                <td>
                    <a href="{{ route('donors.show', $donor) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('donors.edit', $donor) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('donors.destroy', $donor) }}" method="POST" style="display:inline-block;">
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
