@extends('dashboard.layouts.app')
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fas fa-trash-alt"></i> View Video</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Video Management</li>
		<li class="breadcrumb-item active">View Image Galleries</li>
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
                            <th>Unique ID</th>
                            <th>Name</th>
                            <th>posted Date</th>
							<th>Video</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
                        @isset($videos)
                        @foreach($videos as $currentVideoRef)
						<tr class="text-center">
                            <td>{{$currentVideoRef->uniqueID}}</td>
                            <td>{{$currentVideoRef->name}}</td>
                            <td>{{$currentVideoRef->createDate}}</td>
							<td>
                                <video width="360px" controls>
                                    <source src="{{ asset("img/videoGallery/".$currentVideoRef->videoName)}}" type="video/mp4">
                                    Your browser does not support HTML5 video.
                                </video>
                            </td>
							<td>
                                <a class="btn btn-primary btn-view" href="{!! route('restoreVideo',$currentVideoRef->uniqueID) !!}">Restore</a>
                                <a class="btn btn-primary btn-delete" href="{!! route('deleteVideoPermanently',$currentVideoRef->uniqueID) !!}">Delete</a>
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
