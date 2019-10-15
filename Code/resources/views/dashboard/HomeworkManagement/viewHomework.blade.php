@extends('dashboard.layouts.app')
@section('content')
{{-- Content Header --}}
<div class="app-title">
	<div>
		<h1><i class="far fa-edit"></i> View Homework</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Homework Management</li>
		<li class="breadcrumb-item">View Homework</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body col-md-12">
				<h3 class="tile-title">View Homework</h3>
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
				<div class="row">
                    {{csrf_field()}}
					<div class="form-group col-md-6">
						<label >Unique ID</label>
                        <input class="form-control" type="text" value ="{{$homework->uniqueID}}" readonly>
                    </div>

					<div class="form-group col-md-6">
						<label >Created Date</label>
                        <input class="form-control" type="text" value ="{{$homework->createDate}}" readonly>
                    </div>

					<div class="form-group col-md-6">
						<label >Class</label>
                        <input class="form-control" type="text" value ="{{$homework->class}}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="exampleTextarea">Homework Description</label>
                        <textarea class="form-control" maxlength="5000" name="homeworkDescription" id="exampleTextarea" rows="4" readonly>{{$homework->text}}</textarea>
                    </div>

					<div class="form-group col-md-6">
						<label >Homework Date</label>
                        <input class="form-control" type="text" value ="{{$homework->dateOfHomework}}" readonly>
                    </div>

                    <div class="col-md-12">
                        <br>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <label for="exampleInputFile">Slider Image Preview</label>
                            </div>
                            <div class="PreviewImageBlock col-md-12 align-self-center container" id="PreviewImageBlock">
                                <img class="img-fluid" src="{{ asset('img/homework/'.(is_null($homework->imageName) ? 'demo.png': $homework->imageName))}}" id="PreviewImg">
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
                        <a class="btn btn-primary" href=""><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</a>
                        <a class="btn btn-secondary" href="{{ URL::previous() }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
