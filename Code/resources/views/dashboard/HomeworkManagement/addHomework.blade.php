@extends('dashboard.layouts.app')
@section('content')
{{-- Content Header --}}
<div class="app-title">
	<div>
		<h1><i class="far fa-edit"></i> Add Homework</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Homework Management</li>
		<li class="breadcrumb-item">Add Homework</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body col-md-12">
				<h3 class="tile-title">Add Homework</h3>
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
				{{-- Success Message Code --}}
				@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
                @endif
				<form name="homeworkForm" class="row" action="{!! route('addHomework') !!}" method="POST" enctype="multipart/form-data" onsubmit="return homeworkFormValidator()">
                    {{csrf_field()}}
					@php
					$classes = DB::select("SELECT name FROM lookup WHERE category = 'classes' ");
					@endphp
					<div class="form-group col-md-6">
						<label >Class</label>
						<select class="form-control" name="homeworkClass" required="required">
							<option disabled selected value> -- select an class -- </option>
							@foreach($classes as $currentClassesRef)
							<option value="{{$currentClassesRef->name}}">{{$currentClassesRef->name}}</option>
							@endforeach
						</select>
					</div>
                    <div class="form-group col-6">
                        <label for="exampleTextarea">Homework Description</label>
                        <textarea class="form-control" maxlength="5000" name="homeworkDescription" id="exampleTextarea" rows="4"></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Homework Date</label>
                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="homeworkDate" data-target="#datetimepicker" required>
                            <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputFile">Home as Image</label>
                        <input class="form-control-file" name="files[]" id="files" type="file"accept=".jpg,.jpeg,.png"><small class="form-text text-muted" id="fileHelp">This image will show as homework in website. And try to Upload All Images 1440 x 480 px.</small>
                    </div>
                    <div class="col-md-12">
                        <br>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <label for="exampleInputFile">Image Preview</label>
                            </div>
                            <div class="PreviewImageBlock col-md-12 align-self-center container" id="PreviewImageBlock">
                                <img class="img-fluid" src="{{ asset('img/sliders/demo.png') }}" id="PreviewImg">
                            </div>
                        </div>
                    </div>
					<div class="form-group">
						<input class="form-control" name="source" type="hidden" value="Web">
					</div>
					<div class="form-group">
						<input class="form-control" name="language" type="hidden" value="English">
					</div>
					<div class="form-group col-md-12 text-center">
						<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>&nbsp;&nbsp;&nbsp;
						<a class="btn btn-secondary" href="{{ URL::previous() }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
