<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">

    {{-- My Css --}}
    <link rel="stylesheet" href="/css/style.css">
    <title>{{ $title }}</title>
</head>

<body>
    @include("partials.navbar")
    <div class="container">
        @yield("container")
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>