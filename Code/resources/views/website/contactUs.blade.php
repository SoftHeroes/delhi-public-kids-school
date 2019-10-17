@extends('website.layouts.app')
@section('content')

<!-- website Container -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
            <div class="container-fluid contactUs">
                <div class="row">
                    <div class="col-12">
                        <br>
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
                        <br>
                        <h3 class="Display text-center">CONTACT US</h3>
                        <br>
                        <form name="contactUsForm" action="{!! route('sendContactMail') !!}" method="POST" onsubmit="return contactUsValidator()">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="usr">Full Name</label>
                                <input type="text" minlength="4" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="usr">Email ID</label>
                                <input type="email" class="form-control" name="emailID" required>
                            </div>
                            <div class="form-group">
                                <label for="usr">Phone Number</label>
                                <input type="text" minlength="10" class="form-control phoneNumber" name="phoneNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="usr">Message</label>
                                <textarea class="form-control" type="msg" name="" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <br>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
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
