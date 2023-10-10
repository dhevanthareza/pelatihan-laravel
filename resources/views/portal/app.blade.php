<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Blog UDINUS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <!-- Stylesheets -->
    <link href="{{ url('assets/common-css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('assets/common-css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/common-css/layerslider.css') }}" rel="stylesheet">

</head>

<body>
    @yield('content')

    <script src="{{ url('assets/common-js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ url('assets/common-js/tether.min.js') }}"></script>
    <script src="{{ url('assets/common-js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/common-js/layerslider.js') }}"></script>
    <script src="{{ url('assets/common-js/scripts.js') }}"></script>

</body>

</html>
