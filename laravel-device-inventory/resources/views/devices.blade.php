@extends('layouts.app')

@section('content')

    <h2>All Devices</h2>
    <table class="table table-striped table-bordered">
        <thead>
        <th>ID</th>
        <th>Vendor</th>
        <th>Model</th>
        <th colspan="3">Actions</th>
        </thead>
        <tbody>
        @foreach($devices as $dev)
            <tr>
                <td>{{ $dev->id }}</td>
                <td>{{ $dev->vendor }}</td>
                <td>{{ $dev->model }}</td>
                <td>
                    <a href="{{ route('device.details', $dev->id) }}" class="btn btn-primary">Details</a>
                    <a href="{{ route('device.destroy', $dev->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('index') }}" class="btn btn-secondary">Go Back</a>

@endsection
