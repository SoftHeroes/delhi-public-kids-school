@extends('website.layouts.app')
@section('content')

<!-- website Container -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-12 pr-lg-5 pl-lg-5">
                    <div class="col-12">
                        <br>
                    </div>
                    <a class="btn btn-primary" href="{{asset('website/img/admissionForm.jpg')}}" onclick="window.print();return false;">Print Form</a>
                    <div class="col-12">
                        <br>
                    </div>
                    <img class="img-fluid" src="{{asset('website/img/admissionForm.jpg')}}">
                    <div class="col-12">
                        <br>
                    </div>
				</div>
			</div>
		</div>
		<div class="col-md-4 woodBlock justify-content">
			<div class="row">
				<div class="col-12 text-center">
					@include('website.noticeBoard.noticeBoard')
					@yield('noticeBoard')
					@include('website.wishBlock.wishBlock')
                    @yield('wishBlock')
                    @include('website.wishBlock.holidays')
					@yield('holidays')
				</div>
			</div>
		</div>
	</div>
</div>
<!-- website Container -->
@endsection
