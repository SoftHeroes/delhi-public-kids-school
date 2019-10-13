@section('sidebar')
<ul class="app-menu">
	@php
	$routeName = Route::current()->getName();
	$slidersManagment = array('vCreateSlider','vViewSliders','vDeletedSliders');
	@endphp
    <li class="app-menu__item {{$routeName == 'vDashboard' ? 'active' : ''}}"><a href="{!!route('vDashboard')!!}"><i class="fas fa-tachometer-alt"></i><span class="app-menu__label">Welcome</span></a></li>

    <li><a class="app-menu__item {{$routeName == 'vCreateCollage' ? 'active' : ''}}" href="{!!route('vCreateCollage')!!}"><i class="app-menu__icon fa fa-images"></i><span class="app-menu__label">Create Collage</span></a></li>

	<li class="treeview {{ in_array($routeName,$slidersManagment) ? 'is-expanded' : ''}}">
		<a class="app-menu__item" href="../search" data-toggle="treeview"><i class="far fa-image"></i><span class="app-menu__label">Sliders Managment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
		<ul class="treeview-menu">
			<li><a class="treeview-item {{$routeName == 'vCreateSlider' ? 'active' : ''}}" href="{!! route('vCreateSlider') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Create Slider<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vViewSliders' ? 'active' : ''}}" href="{!! route('vViewSliders') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">View Sliders<span></a></li>
			<li><a class="treeview-item {{$routeName == 'vDeletedSliders' ? 'active' : ''}}" href="{!! route('vDeletedSliders') !!}"><i class="icon fa fa-circle-o"></i><span class="app-menu_sub_item">Deleted Sliders<span></a></li>
		</ul>
    </li>
</ul>
@endsection
