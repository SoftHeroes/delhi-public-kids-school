@extends('website.layouts.app')
@section('content')
@php
    use Illuminate\Support\Facades\DB;
@endphp

<!-- website Container -->
<div class="container-fluid videoGalleryBlock">
    <div class="row">
        @php
        $videos = DB::select("SELECT * FROM videoGallery WHERE deletedAt IS NULL ORDER BY createDate DESC");
        $index = 1;
        @endphp

        @foreach ($videos as $currentVideoRef)
        <!-- Hidden video div -->
        <div style="display:none;" id="video{{$index}}">
            <video class="lg-video-object lg-html5" controls preload="none">
                <source src="{{asset('/img/videoGallery/'.$currentVideoRef->videoName) }}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
        @php $index++;@endphp
        @endforeach

        @php
            $count = count($videos);
        @endphp
        @if ( $count != 0)
            <div class="container-fluid">
                <ul id="html5-videos" class="row" style="list-style-type: none;">
                    @php $index = 1; @endphp
                    @foreach ($videos as $currentVideoRef)
                    <li class="col-md-6 col-lg-3" data-poster="{{asset('/img/videoGallery/demo.jpg') }}" data-sub-html="{{$currentVideoRef->name}}" data-html="#video{{$index}}">
                        <div class="img-hover-zoom">
                            <img class="img-fluid" src="{{asset('/img/videoGallery/demo.jpg') }}"/>
                        </div>
                        <p class="text-center">{{$currentVideoRef->name}}</p>
                    </li>
                    {{-- @if ( $count < 4 && $index == $count )
                        @for ($i = 0; $i < (4 - $count) ; $i++)
                            <li class="col-md-6 col-lg-3"></li>
                        @endfor
                    @endif --}}
                    @php $index++;@endphp
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
<!-- website Container -->

@endsection
