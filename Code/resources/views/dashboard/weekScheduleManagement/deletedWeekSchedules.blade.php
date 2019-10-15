@extends('dashboard.layouts.app')
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fas fa-table"></i> Deleted Week Schedules</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Week Schedules Management</li>
		<li class="breadcrumb-item active">Deleted Week Schedules</li>
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
                            <th>class</th>
                            <th>Week</th>
                            <th>Description</th>
							<th>Image</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
                        @isset($weekSchedules)
                        @foreach($weekSchedules as $currentWeekSchedules)
						<tr class="text-center">
                            <td>{{$currentWeekSchedules->uniqueID}}</td>
                            <td>{{$currentWeekSchedules->class}}</td>
                            <td>{{$currentWeekSchedules->startDate.' - '.$currentWeekSchedules->endDate}}</td>
                            <td>{{$currentWeekSchedules->text}}</td>
							<td class="previewImg">
                                @if ( !is_null($currentWeekSchedules->imageName))
                                    <img class="table-img" src={{ asset("img/weekSchedule/".$currentWeekSchedules->imageName) }}>
                                @endif
                            </td>
							<td>
                                <a class="btn btn-primary btn-view" href="{!! route('restoreWeekSchedule',$currentWeekSchedules->uniqueID) !!}">Restore</a>
                                <a class="btn btn-primary btn-delete" href="{!! route('deleteWeekSchedulePermanently',$currentWeekSchedules->uniqueID) !!}">Delete</a>
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
