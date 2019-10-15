@extends('dashboard.layouts.app')
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fas fa-table"></i> Deleted Principal Messages</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Principal Messages Management</li>
		<li class="breadcrumb-item active">Deleted Principal Messages</li>
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
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Posted Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
                        @isset($principalMessages)
                        @foreach($principalMessages as $currentPrincipalMessages)
						<tr class="text-center">
                            <td>{{$currentPrincipalMessages->uniqueID}}</td>
                            <td>{{$currentPrincipalMessages->title}}</td>
                            <td>{{$currentPrincipalMessages->subtitle}}</td>
                            <td>{{$currentPrincipalMessages->createDate}}</td>
							<td>
                                <a class="btn btn-primary btn-view" href="{!! route('restorePrincipalMessages',$currentPrincipalMessages->uniqueID) !!}">Restore</a>
                                <a class="btn btn-primary btn-delete" href="{!! route('deletePrincipalMessagesPermanently',$currentPrincipalMessages->uniqueID) !!}">Delete</a>
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
