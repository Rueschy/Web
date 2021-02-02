@extends('layouts.app')

@section('content')

    <h1>Location Details</h1>

    <form method="post" action="{{ route('location.update', $location->id) }}">
        @csrf
        <p>
            <strong>Name:</strong>
            <input type="text" name="name" value="{{ $location->name }}"/>
        </p>
        <p>
            <strong>Size:</strong>
            <input type="text" name="size" value="{{ $location->size }}"/>
        </p>
        <p>
            <button type="submit" class="btn bg-light btn-outline-dark">Update</button>
            <a href="{{ route('index') }}" class="btn btn-secondary">Go Back</a>
            <a href="{{ route('location.destroy', $location->id) }}" class="btn btn-danger">Delete</a>
        </p>
    </form>

    <h2>All Devices</h2>
    @if($devices != null)
    <table class="table table-striped table-bordered">
        <thead>
        <th>ID</th>
        <th>Vendor</th>
        <th>Model</th>
        <th>Year</th>
        <th colspan="3">Actions</th>
        </thead>
        <tbody>
        @foreach($devices as $dev)
            <tr>
                <td>{{ $dev->id }}</td>
                <td>{{ $dev->vendor }}</td>
                <td>{{$dev->model}}</td>
                <td>{{$dev->year}}</td>
                <td>
                    <form method="get" action="{{ route('device.remove', $dev->id, $dev->location_id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif

@endsection
