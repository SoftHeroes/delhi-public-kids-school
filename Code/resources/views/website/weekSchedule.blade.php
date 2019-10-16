@extends('website.layouts.app')
@section('content')
@include('website.slider.slider')
@yield('slider')

@php
    use Illuminate\Support\Facades\DB;
@endphp
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
					<div class="tabMenu">
						<ul class="nav nav-tabs nav-fill">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#preNursery">Pre-Nursery (Play Group)</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#nursery">Nursery</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kg1">KG-1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kg2">KG-2</a>
							</li>
							<li class="nav-item dropdown mobileDropdown">
								<a class="nav-link dropdown-toggle active" id="mobileDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pre-Nursery (Play Group)</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" onclick="changeLinkText(this.innerHTML)" data-toggle="tab" href="#preNursery">Pre-Nursery (Play Group)</a>
									<a class="dropdown-item" onclick="changeLinkText(this.innerHTML)" data-toggle="tab" href="#nursery">Nursery</a>
									<a class="dropdown-item" onclick="changeLinkText(this.innerHTML)" data-toggle="tab" href="#kg1">KG-1</a>
									<a class="dropdown-item" onclick="changeLinkText(this.innerHTML)" data-toggle="tab" href="#kg2">KG-2</a>
								</div>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
                            {{-- Pre-Nursery (Play Group) --}}
							<div class="tab-pane container-fluid active" id="preNursery">
                                <div class="title text-center">Week Schedules</div>

                                @php
                                    $weekSchedules = null;
                                    $weekSchedules = DB::select("SELECT * FROM weekSchedules WHERE class = 'Pre-Nursery (Play Group)'");
                                @endphp
                                @include('website.notice.weekSchedulePost')
                                @yield('weekSchedulePost')
                            </div>

                            {{-- Nursery --}}
							<div class="tab-pane container-fluid" id="nursery">
                                <div class="title text-center">Week Schedules</div>

                                @php
                                    $weekSchedules = null;
                                    $weekSchedules = DB::select("SELECT * FROM weekSchedules WHERE class = 'Nursery'");
                                @endphp
                                @include('website.notice.weekSchedulePost')
                                @yield('weekSchedulePost')
                            </div>

                            {{-- KG-1 --}}
							<div class="tab-pane container-fluid" id="kg1">
                                <div class="title text-center">Week Schedules</div>

                                @php
                                    $weekSchedules = null;
                                    $weekSchedules = DB::select("SELECT * FROM weekSchedules WHERE class = 'KG-1'");
                                @endphp
                                @include('website.notice.weekSchedulePost')
                                @yield('weekSchedulePost')
                            </div>

                            {{-- KG-2 --}}
							<div class="tab-pane container-fluid" id="kg2">
                                <div class="title text-center">Week Schedules</div>

                                @php
                                    $weekSchedules = null;
                                    $weekSchedules = DB::select("SELECT * FROM weekSchedules WHERE class = 'KG-2'");
                                @endphp
                                @include('website.notice.weekSchedulePost')
                                @yield('weekSchedulePost')
                            </div>

						</div>
					</div>
					<br><br>
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
