<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>

    @include('partials.header')
</head>
<body>

    @yield('content')

    @include('partials.scripts')

</body>

</html>






