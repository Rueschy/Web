@extends('layouts.app')

@section('content')

    <h1>Device Details</h1>

    <form method="post" action="{{ route('device.update', $device->id) }}">
        @csrf
        <p>
            <strong>Vendor:</strong>
            <input type="text" name="vendor" value="{{ $device->vendor }}"/>
        </p>
        <p>
            <strong>Model:</strong>
            <input type="text" name="model" value="{{ $device->model }}"/>
        </p>
        <p>
            <strong>Year:</strong>
            <input type="text" name="year" value="{{ $device->year }}"/>
        </p>
        <p>
            <strong>Borrowed:</strong>
            <label> @if($device->borrowed == 1) True @else False @endif</label>
        </p>
        <p>
            <strong>Location:</strong>
            <select name="location">
                <option value="-1" {{$device->location ? '' : 'selected'}}>No Location</option>
                @php $locations = \App\Location::all() @endphp
                @foreach($locations as $lo)
                    <option value="{{$lo->id}}" {{$device->location ? $device->location->id == $lo->id ? 'selected' : '' : ''}}>{{$lo->name}}</option>
                @endforeach
            </select>
        </p>
        <p>
            <button type="submit" class="btn bg-light btn-outline-dark">Update</button>
            <a href="{{ route('devices.index') }}" class="btn btn-secondary">Go Back</a>
        </p>
    </form>

@endsection
