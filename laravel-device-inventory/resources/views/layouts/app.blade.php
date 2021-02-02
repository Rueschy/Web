<html>
<head>
    <title>LAR02_Inventory</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<!-- Navigation Bar -->
@php /*
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="{{ route('songs.index') }}">Songs</a>
    <!-- Links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="{{ route('songs.index') }}" class="btn btn-outline-light">All Songs</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('songs.create') }}" class="btn btn-outline-light">Create Song</a>
        </li>
    </ul>
</nav> */
@endphp

<!-- content placeholder -->
@yield('content')

<!-- errors -->
@if($errors)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif

<!-- JavaScripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
