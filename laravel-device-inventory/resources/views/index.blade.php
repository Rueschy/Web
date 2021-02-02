@extends('layouts.app')

@section('content')
    <h2>All Locations</h2>
    <table class="table table-striped table-bordered">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Size (m²)</th>
        <th>Device-Count</th>
        <th colspan="3">Actions</th>
        </thead>
        <tbody>
            @foreach($locations as $lo)
                <tr>
                    <td>{{ $lo->id }}</td>
                    <td>{{ $lo->name }}</td>
                    <td>{{ $lo->size }}</td>
                    <td>{{ count($lo->devices) }}</td>
                    <td>
                        <a href="{{ route('location.details', $lo->id) }}" class="btn btn-primary">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('devices.index') }}" class="btn btn-primary">Go To Devices</a><br><br>

    <p>
        <h4>Locations and Devices are created via 'php artisan db:seed'!</h4>
    </p>


@endsection
