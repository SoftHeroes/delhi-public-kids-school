@extends('dashboard.layouts.app')
@section('content')
{{-- Content Header --}}
<div class="app-title">
	<div>
		<h1><i class="far fa-eye"></i> Create Slider</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Slider Management</li>
		<li class="breadcrumb-item">view Slider</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body col-md-12">
                <h3 class="tile-title">View Slider</h3>

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
				<form class="row" action="{!! route('createSlider') !!}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<h1></h1>
					<div class="form-group col-md-6">
						<label >Silder ID</label>
                        <input class="form-control" maxlength="50" name="uniqueID" type="text" value ="{{$slider->uniqueID}}" placeholder="Silder Title" readonly>
                    </div>
					<div class="form-group col-md-6">
						<label >Silder Title</label>
                        <input class="form-control" maxlength="50" name="title" type="text" value ="{{$slider->title}}" placeholder="Silder Title" readonly>
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
                                <img class="img-fluid" src="{{ asset('img/sliders/'.$slider->imageName) }}" id="PreviewImg">
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
                        <a class="btn btn-primary" href="{!! route('vEditSlider',$slider->uniqueID) !!}"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</a>
                        <a class="btn btn-secondary" href="{{ URL::previous() }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
