<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.partials.head')

</head>
<body>

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @include('layouts.partials.scripts')

</body>
</html>
