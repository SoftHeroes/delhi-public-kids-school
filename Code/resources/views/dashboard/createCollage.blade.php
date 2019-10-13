@extends('dashboard.layouts.app')
@section('content')
{{-- Content Header --}}
<div class="app-title">
	<div>
		<h1><i class="far fa-images"></i> Create Collage</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Create Collage</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body col-md-12">
				<h3 class="tile-title">Create Collage</h3>
				<div class="row createCollage">
					<div class="col-lg-9">
						<div class="col-md-12">
							<br>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label >Preregistration required</label>
								<select class="form-control" id="modelSelect" onchange="modelSelect()">
									<option disabled selected value=""> -- select the pattern -- </option>
									<option value="model1">1 X 2 Collage</option>
									<option value="model2">1 X 3 Collage</option>
                                    <option value="model3">2 X 2 Collage</option>
                                    <option value="model4">3 X 3 Collage 1</option>
                                    <option value="model5">5 X 1 Collage </option>
								</select>
							</div>
							<div class="col-lg-6">
								<label >Background image</label>
								<div id="singleUploadSection" class="col-12">
									<input id="singleUpload" type="file" onchange="setBackground()"/><small class="form-text text-muted" id="fileHelp">Click "Browse" to select a background image for your canvas!</small>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<br><br>
						</div>
						<div class="row">
							<div class="col-12" id="photo">
                                <canvas id="background"></canvas>
                            </div>
						</div>
						<div class="col-12">
							<br><br>
						</div>
					</div>
					<div class="col-lg-3">
						<div id="leftSide">
							<div id="dropZone">
								<p>Drag your images from your file source click <u>here</u>!</p>
							</div>
							<div id="images_preview"></div>
						</div>
					</div>
					<div class="col-md-12 text-center">
						<a href="#" class="button btn btn-primary" id="btn-download"><i class="fas fa-download"></i>&ensp;Download</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
