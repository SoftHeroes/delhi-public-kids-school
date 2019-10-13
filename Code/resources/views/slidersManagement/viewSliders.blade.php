@extends('layouts.app')
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fas fa-table"></i> View Sliders</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Sliders Management</li>
		<li class="breadcrumb-item active">View Sliders</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
            {{-- Error Message Code --}}
            @if(session()->has('errors'))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <br />
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
			<div class="tile-body">
				<div class="table-search">
					Search :&nbsp;&nbsp;
					<input type="text" id="mySearch" onkeyup="searchInTable()" placeholder="Search for names.." title="Type in a name">
				</div>
				<table class="table table-hover table-bordered" id="myTable">
					<thead>
						<tr>
							<th>UniqueID</th>
							<th>Title</th>
							<th>Image</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
                        @isset($sliders)
                        @foreach($sliders as $currentSliders)
						<tr class="text-center">
							<td>{{$currentSliders->uniqueID}}</td>
							<td>{{$currentSliders->title}}</td>
							<td class="previewImg"><img class="table-img" src={{ asset("img/sliders/".$currentSliders->imageName) }}></td>
							<td>
								<a class="btn btn-primary btn-view" href="{!! route('vViewSlider',$currentSliders->uniqueID) !!}">View</a>
								<a class="btn btn-primary btn-edit" href="{!! route('vEditSlider',$currentSliders->uniqueID) !!}">Edit</a>
								<a class="btn btn-primary btn-delete" href="{!! route('deleteSlider',$currentSliders->uniqueID) !!}">Delete</a>
							</td>
                        </tr>
                        @endforeach
                        @endisset
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
