@extends('dashboard.layouts.app')
@section('content')
{{-- Content Header --}}
<div class="app-title">
	<div>
		<h1><i class="far fa-edit"></i> Create Slider</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Slider Management</li>
		<li class="breadcrumb-item">edit Slider</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body col-md-12">
                <h3 class="tile-title">Edit Slider</h3>

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
				<form class="row" action="{!! route('updateSlider') !!}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<h1></h1>
					<div class="form-group col-md-6">
						<label >Silder Title</label>
                    <input class="form-control" maxlength="50" name="title" type="text" value ="{{$slider->title}}" placeholder="Silder Title">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputFile">Slider Image</label>
                        <input class="form-control-file" name="files[]" id="files" type="file"accept=".jpg,.jpeg,.png"><small class="form-text text-muted" id="fileHelp">This image will show as slider image in website. And try to Upload All Images 1440 x 480 px.</small>
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
						<input class="form-control" name="uniqueID" type="hidden" value="{{$slider->uniqueID}}">
					</div>
					<div class="form-group">
						<input class="form-control" name="source" type="hidden" value="Web">
					</div>
					<div class="form-group">
						<input class="form-control" name="language" type="hidden" value="English">
					</div>
					<div class="form-group col-md-12 text-center">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ URL::previous() }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
