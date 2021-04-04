<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.layouts.head')
</head>
<body>
    @include('user.layouts.loading')
    @include('user.layouts.navigation')
    @yield('content')
    @include('user.layouts.footer')
    @include('user.layouts.scripts')
</body>
</html>