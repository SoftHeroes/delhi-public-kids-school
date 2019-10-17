@extends('website.layouts.app')
@section('content')
@include('website.slider.slider')
@yield('slider')

@php
    use Illuminate\Support\Facades\DB;
@endphp

@include('website.news.news')
@yield('news')

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
                                <div class="title text-center">Homeworks</div>

                                @php
                                    $homeworks = null;
                                    $homeworks = DB::select("SELECT * FROM homeworks WHERE class = 'Pre-Nursery (Play Group)' ORDER BY createDate DESC");
                                @endphp
                                @include('website.notice.homeworkPost')
                                @yield('homeworkPost')
                            </div>

                            {{-- Nursery --}}
							<div class="tab-pane container-fluid" id="nursery">
                                <div class="title text-center">Homeworks</div>

                                @php
                                    $homeworks = null;
                                    $homeworks = DB::select("SELECT * FROM homeworks WHERE class = 'Nursery' ORDER BY createDate DESC");
                                @endphp
                                @include('website.notice.homeworkPost')
                                @yield('homeworkPost')
                            </div>

                            {{-- KG-1 --}}
							<div class="tab-pane container-fluid" id="kg1">
                                <div class="title text-center">Homeworks</div>

                                @php
                                    $homeworks = null;
                                    $homeworks = DB::select("SELECT * FROM homeworks WHERE class = 'KG-1' ORDER BY createDate DESC");
                                @endphp
                                @include('website.notice.homeworkPost')
                                @yield('homeworkPost')
                            </div>

                            {{-- KG-2 --}}
							<div class="tab-pane container-fluid" id="kg2">
                                <div class="title text-center">Homeworks</div>

                                @php
                                    $homeworks = null;
                                    $homeworks = DB::select("SELECT * FROM homeworks WHERE class = 'KG-2' ORDER BY createDate DESC ");
                                @endphp
                                @include('website.notice.homeworkPost')
                                @yield('homeworkPost')
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
