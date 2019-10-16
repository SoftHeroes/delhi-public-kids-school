@extends('website.layouts.app')
@section('content')
@include('website.slider.slider')
@yield('slider')
<!-- News heading -->
<div class="header-top-design-noColor">&nbsp;</div>
<div class="newHeadingBlock">
	<div class="newsheading text-center">Admission</div>
	<marquee behavior="scroll" scrollamount="5" onMouseOver="this.stop();" onMouseOut="this.start();" direction="left">
		<img src="{{ asset('website/img/title_icon.png') }}" alt="">
		<a href="http://dpskidsbhopal.com" class="news-title" style="text-decoration:none">Admissions for Playgroup, Nursery, KG-1, KG-2 are open for 2019-20 Please visit our campus..</a>
	</marquee>
</div>
<div class="header-top-design-noColor-rotated">&nbsp;</div>
<!-- News heading -->
<!-- website Container -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-12">

                    @php
                        use Illuminate\Support\Facades\DB;
                        $principalMessages = DB::select('SELECT * FROM principalMessages WHERE deletedAt IS NULL');
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
