@extends('dashboard.layouts.app')
@section('content')
{{-- Content Header --}}
<div class="app-title">
	<div>
		<h1><i class="far fa-edit"></i> Add Video</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Video Management</li>
		<li class="breadcrumb-item">Add Video</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body col-md-12">
				<h3 class="tile-title">Add Video</h3>
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
				<form name="imageGalleryForm" class="row" action="{!! route('addVideo') !!}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
					<div class="form-group col-md-6">
						<label >Gallery Name</label>
						<input class="form-control" maxlength="255" name="name" required="required" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputFile">Video</label>
                        <input class="form-control-file file_multi_video" name="files[]" id="files" required="required" type="file"accept="video/*"><small class="form-text text-muted" id="fileHelp">This image will show in video Gallery. And try to Upload video less then 200MB.</small>
                    </div>

                    <div class="col-md-12">
                        <br><br>
                    </div>
                    <div class="col-md-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video controls>
                                <source id="video_here" src="mov_bbb.mp4" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <br><br>
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
