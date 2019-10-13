@extends('dashboard.layouts.app')
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fas fa-trash-alt"></i> Deleted Sliders</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Sliders Management</li>
		<li class="breadcrumb-item active">Deleted Sliders</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
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
                                <a class="btn btn-primary btn-view" href="{!! route('restoreSlider',$currentSliders->uniqueID) !!}">Restore</a>
                                <a class="btn btn-primary btn-delete" href="{!! route('deleteSliderPermanently',$currentSliders->uniqueID) !!}">Delete</a>
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
