<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Zone admin</title>
    <link rel="stylesheet" href="{{ URL::to('src/css/admin.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/lib/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ URL::to('src/lib/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::to('src/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    @yield('styles')
</head>
<body>
<section class="container">
    @include('includes.navigation-admin')
    @yield('contenu')
</section>
<script>
    var baseURL="{{URL::to('/')}}";
</script>
@yield('scripts')

</body>
</html>