@section('sidebar')
<ul class="app-menu">
	@php
	$routeName = Route::current()->getName();
    $slidersManagment = array('vCreateSlider','vViewSliders','vDeletedSliders');
    $homeworkManagment = array('vAddHomework','vViewHomeworks','vDeletedHomeworks');
    $weekSchedulesManagment = array('vAddWeekSchedule','vViewWeekSchedules','vDeletedWeekSchedules');
    $principalMessagesManagment = array('vAddPrincipalMessage','vViewPrincipalMessages','vDeletedPrincipalMessages');
    $studentManagment = array('vAddStudent','vViewStudents','vDeletedStudents');
    $imageGalleryManagment = array('vAddImageGallery','vViewImageGalleries','vDeletedImageGalleries');
	@endphp
    <li class="app-menu__item {{$routeName == 'vDashboard' ? 'active' : ''}}"><a href="{!!route('vDashboard')!!}"><i class="fas fa-tachometer-alt"></i><span class="app-menu__label">Welcome</span></a></li>

    <li><a class="app-menu__item {{$routeName == 'vCreateCollage' ? 'active' : ''}}" href="{!!route('vCreateCollage')!!}"><i class="app-menu__icon fa fa-images"></i><span class="app-menu__label">Create Collage</span></a></li>

    {{-- Sliders Managment --}}
	<li class="treeview {{ in_array($routeName,$slidersManagment) ? 'is-expanded' : ''}}">
		<a class="app-menu__item" href="../search" data-toggle="treeview"><i class="far fa-image"></i><span class="app-menu__label">Sliders Managment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
		<ul class="treeview-menu">
			<li><a class="treeview-item {{$routeName == 'vCreateSlider' ? 'active' : ''}}" href="{!! route('vCreateSlider') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Create Slider<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vViewSliders' ? 'active' : ''}}" href="{!! route('vViewSliders') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">View Sliders<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vDeletedSliders' ? 'active' : ''}}" href="{!! route('vDeletedSliders') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Deleted Sliders<span></a></li>
		</ul>
    </li>

    {{-- Homework Managment --}}
	<li class="treeview {{ in_array($routeName,$homeworkManagment) ? 'is-expanded' : ''}}">
		<a class="app-menu__item" href="../search" data-toggle="treeview"><i class="fas fa-book"></i><span class="app-menu__label">Homework Managment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
		<ul class="treeview-menu">
			<li><a class="treeview-item {{$routeName == 'vAddHomework' ? 'active' : ''}}" href="{!! route('vAddHomework') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Add Homework<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vViewHomeworks' ? 'active' : ''}}" href="{!! route('vViewHomeworks') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">View Homeworks<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vDeletedHomeworks' ? 'active' : ''}}" href="{!! route('vDeletedHomeworks') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Deleted Homeworks<span></a></li>
		</ul>
    </li>

    {{-- Week Schedule Managment --}}
	<li class="treeview {{ in_array($routeName,$weekSchedulesManagment) ? 'is-expanded' : ''}}">
		<a class="app-menu__item" href="../search" data-toggle="treeview"><i class="fas fa-calendar-week"></i><span class="app-menu__label">Week Schedule </span><i class="treeview-indicator fa fa-angle-right"></i></a>
		<ul class="treeview-menu">
			<li><a class="treeview-item {{$routeName == 'vAddWeekSchedule' ? 'active' : ''}}" href="{!! route('vAddWeekSchedule') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Add Week Schedule<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vViewWeekSchedules' ? 'active' : ''}}" href="{!! route('vViewWeekSchedules') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">View Week Schedule<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vDeletedWeekSchedules' ? 'active' : ''}}" href="{!! route('vDeletedWeekSchedules') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Deleted Week Schedule<span></a></li>
		</ul>
    </li>

    {{-- Principal Messages Managment --}}
	<li class="treeview {{ in_array($routeName,$principalMessagesManagment) ? 'is-expanded' : ''}}">
		<a class="app-menu__item" href="../search" data-toggle="treeview"><i class="fas fa-sticky-note"></i><span class="app-menu__label">Principal Messages </span><i class="treeview-indicator fa fa-angle-right"></i></a>
		<ul class="treeview-menu">
			<li><a class="treeview-item {{$routeName == 'vAddPrincipalMessage' ? 'active' : ''}}" href="{!! route('vAddPrincipalMessage') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Add Principal Messages<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vViewPrincipalMessages' ? 'active' : ''}}" href="{!! route('vViewPrincipalMessages') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">View Principal Messages<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vDeletedPrincipalMessages' ? 'active' : ''}}" href="{!! route('vDeletedPrincipalMessages') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Deleted Principal Messages<span></a></li>
		</ul>
    </li>

    {{-- Student Managment --}}
	<li class="treeview {{ in_array($routeName,$studentManagment) ? 'is-expanded' : ''}}">
		<a class="app-menu__item" href="../search" data-toggle="treeview"><i class="fas fa-user-graduate"></i><span class="app-menu__label">Student Managment </span><i class="treeview-indicator fa fa-angle-right"></i></a>
		<ul class="treeview-menu">
			<li><a class="treeview-item {{$routeName == 'vAddStudent' ? 'active' : ''}}" href="{!! route('vAddStudent') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Add Student<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vViewStudents' ? 'active' : ''}}" href="{!! route('vViewStudents') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">View Student<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vDeletedStudents' ? 'active' : ''}}" href="{!! route('vDeletedStudents') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Deleted Student<span></a></li>
		</ul>
    </li>

    {{-- Image Gallery Managment --}}
	<li class="treeview {{ in_array($routeName,$imageGalleryManagment) ? 'is-expanded' : ''}}">
		<a class="app-menu__item" href="../search" data-toggle="treeview"><i class="fas fa-images"></i><span class="app-menu__label">Image Gallery </span><i class="treeview-indicator fa fa-angle-right"></i></a>
		<ul class="treeview-menu">
			<li><a class="treeview-item {{$routeName == 'vAddImageGallery' ? 'active' : ''}}" href="{!! route('vAddImageGallery') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Add Image Gallery<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vViewImageGalleries' ? 'active' : ''}}" href="{!! route('vViewImageGalleries') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">View Image Galleries<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vDeletedImageGalleries' ? 'active' : ''}}" href="{!! route('vDeletedImageGalleries') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Deleted Image Galleries<span></a></li>
		</ul>
    </li>

</ul>
@endsection
