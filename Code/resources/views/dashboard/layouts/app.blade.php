<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="description" content="Delhi Kids School">
		<!-- Twitter meta-->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:site" content="@pratikborsadiya">
		<meta property="twitter:creator" content="@pratikborsadiya">
		<!-- Open Graph Meta-->
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="Vali Admin">
		<meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
		<meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
		<meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
		<meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
		<title>Delhi Kids School</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/createCollage.css') }}">
		<!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" SameSite="None">

		<!-- Tempus Dominus CDN-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

        {{-- jQuery CDN --}}
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css">

	</head>
	<body class="app sidebar-mini rtl {{Route::current()->getName() == 'vCreateCollage' ? 'sidenav-toggled' : ''}}">
		<!-- Navbar-->
		<header class="app-header">
			<a class="app-header__logo" href="index.html">Delhi Kids School</a>
			<!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
			<!-- Navbar Right Menu-->
			@include('dashboard.header.header')
			@yield('header')
		</header>
		<!-- Sidebar menu-->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar">
			@include('dashboard.sidebar.sidebar')
			@yield('sidebar')
		</aside>
		<main class="app-content">
			@yield('content')
        </main>

		<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<script src=" {{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>

		<!-- The javascript plugin to display page loading on top-->
        <script src=" {{asset('js/plugins/pace.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/random.js')}}"></script>
		<!-- Google analytics script-->
        <script type="text/javascript" src="{{asset('js/googleAnalytics.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/chart.js')}}"></script>


        {{-- My Start --}}
        <!-- Essential javascripts for application to work-->
        <script src="{{ asset('js/inputValidation.js') }}"></script>

        <!-- New Create JS for Feature-->
		<script src="{{asset('js/sliderPreview.js')}}"></script>
        <script src="{{asset('js/searchInTable.js')}}"></script>

		<!-- font Awesome -->
        <script src="https://kit.fontawesome.com/c645529b0c.js" SameSite="None" ></script>

        {{-- jQuery CDN --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>

		<!-- moment for language support in Tempus Dominus CDN-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>

		<!-- Tempus Dominus CDN-->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>

        {{-- Create Collage --}}
        <script src="{{asset('js/createCollage/fileUpload.js')}}"></script>
        <script src="{{asset('js/createCollage/models.js')}}"></script>
        <script src="{{asset('js/createCollage/exportImg.js')}}"></script>

        {{-- date --}}
        <script src="{{asset('js/date.js')}}"></script>

        {{-- Form Validation --}}
        <script src="{{asset('js/formValidation.js')}}"></script>

        {{-- Image Gallery --}}
        <script src="{{asset('js/imageGallery.js')}}"></script>

        {{-- Video Gallery --}}
        <script src="{{asset('js/video.js')}}"></script>

        {{-- Week Picker --}}
        <script src="{{asset('plugins/weekPicker/js/jquery.weekpicker.js')}}"></script>
        <script>
            var elemrntRef = $( "#weekPicker" );
            if(elemrntRef)
                elemrntRef.weekpicker();
        </script>
	</body>
</html>
