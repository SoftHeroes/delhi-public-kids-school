@extends('dashboard.layouts.app')
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fas fa-table"></i> View Homeworks</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Homeworks Management</li>
		<li class="breadcrumb-item active">View Homeworks</li>
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
                            <th>Created Date</th>
                            <th>Homework Date</th>
                            <th>Homework Description</th>
							<th>Image</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
                        @isset($homeworks)
                        @foreach($homeworks as $currentHomework)
						<tr class="text-center">
                            <td>{{substr($currentHomework->createDate,0,10)}}</td>
                            <td>{{$currentHomework->dateOfHomework}}</td>
                            <td>{{$currentHomework->text}}</td>
							<td class="previewImg">
                                @if ( !is_null($currentHomework->imageName))
                                    <img class="table-img" src={{ asset("img/homework/".$currentHomework->imageName) }}>
                                @endif
                            </td>
							<td>
								<a class="btn btn-primary btn-delete" href="{!! route('deleteHomework',$currentHomework->uniqueID) !!}">Delete</a>
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
