@extends('dashboard.layouts.app')
@section('content')
{{-- Content Header --}}
<div class="app-title">
	<div>
		<h1><i class="far fa-edit"></i> Add Student</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Student Management</li>
		<li class="breadcrumb-item">Add Student</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body col-md-12">
				<h3 class="tile-title">Add Student</h3>
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
				<form name="StudentForm" class="row" action="{!! route('addStudent') !!}" method="POST" enctype="multipart/form-data" onsubmit="return StudentFormValidator()">
                    {{csrf_field()}}

                    <div class="form-group col-6">
                        <label for="exampleTextarea">Student First Name</label>
                        <input class="form-control" maxlength="50" name="fname" type="text" placeholder="First Name" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleTextarea">Student Last Name</label>
                        <input class="form-control" maxlength="50" name="lname" type="text" placeholder="Last Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Student Date of birth</label>
                        <div class="input-group date" id="DOB" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="StudentDate" data-target="#DOB" required>
                            <div class="input-group-append" data-target="#DOB" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputFile">student image</label>
                        <input class="form-control-file" name="files[]" id="files" type="file"accept=".jpg,.jpeg,.png" required><small class="form-text text-muted" id="fileHelp">This image will show on birth of student. Try upload passport size photo.</small>
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
