<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    {{-- Bootstrap --}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    {{-- Dashboard Css --}}
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">

    {{-- Trix Editor --}}
    <link rel="stylesheet" href="/css/trix.css">
    <script src="/js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
    </style>
</head>

<body>
    @include("dashboard.partials.header")
    <div class="container-fluid">
        <div class="row">
            @include("dashboard.partials.sidebar")

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield("container")
            </main>
        </div>
    </div>


    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/dashboard.js"></script>
</body>

</html>