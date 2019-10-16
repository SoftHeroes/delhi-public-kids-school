<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="DPS KIDS BHOPAL, Best Kindergarten School in Bhopal, 07552418222, 7879136615, Best School,Kusum Mathur, Deepak Mathur" />
    <meta name="keywords" content="DPS KIDS BHOPAL, Best Kindergarten School in Bhopal, 07552418222, 7879136615, Best School,Kusum Mathur, Deepak Mathur" />
    <meta name="description" content="">

    <title>DPS KIDS SCHOOL BHOPAL</title>

    <!-- CSS START-->

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}" />

    <!-- CSS END-->

</head>

<body>

    @include('website.header.header')
    @yield('header')

    @include('website.header.navbar')
    @yield('navbar')

    @yield('content')

    @include('website.footer.footer')
    @yield('footer')

    <!-- JS START-->

    <!-- font Awesome CDN -->
    <script src="https://kit.fontawesome.com/c645529b0c.js"></script>

    <!-- BootStrap CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- jQuery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- share this CDN-->
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c14ae2a7b0b4500110a1ea6&product=inline-share-buttons' async='async'></script>

    {{-- Notice --}}
    <script src="{{asset('website/js/tabMenu.js')}}"></script>

    <!-- JS END -->
</body>

</html>
