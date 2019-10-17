@extends('website.layouts.app')
@section('content')
@include('website.slider.slider')
@yield('slider')

@include('website.news.news')
@yield('news')

<!-- website Container -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-12">

                    @php
                        use Illuminate\Support\Facades\DB;
                        $principalMessages = DB::select('SELECT * FROM principalMessages WHERE deletedAt IS NULL ORDER BY createDate DESC');
                    @endphp

                    @foreach ($principalMessages as $currentPrincipalMessage)
                        @php
                        $PMTitle = $currentPrincipalMessage->title;
                        $PMSubTitle = $currentPrincipalMessage->subtitle;
                        $PMCreatedDate = $currentPrincipalMessage->createDate;
                        @endphp
                        @include('website.paragraph.principalMessages')
                        @yield('principalMessages')
                    @endforeach

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
