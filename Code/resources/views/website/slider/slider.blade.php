@section('slider')

@php
    $sliders = DB::select("select uniqueID,title,imageName from sliders where deletedAt IS NULL");
@endphp
<!-- Image Slider -->
@if (count($sliders) > 0 )
<div id="slides" class="carousel slide slider" data-ride="carousel">
        <ul class="carousel-indicators">
            @for ($i = 0; $i < count($sliders); $i++)
                <li data-target="#slides" data-slide-to="0" class="{{$i == 0 ? 'active' : ''}}"></li>
            @endfor
        </ul>
        <div class="carousel-inner">
            @for ($i = 0; $i < count($sliders); $i++)
            <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                <img class="img-fluid" src="{{asset('/img/sliders/'.$sliders[$i]->imageName) }}">
                @if ( !is_null($sliders[$i]->title) && trim($sliders[$i]->title) != "" )
                <div class="carousel-caption">
                    <h3 class="Display">{{$sliders[$i]->title}}</h3>
                </div>
                @endif
            </div>
            @endfor
        </div>
        <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev"><span class="fas fa-chevron-left"></span></a>
        <a class="carousel-control-next" href="#slides" role="button" data-slide="next"><span class="fas fa-chevron-right"></span></a>
        </a>
    </div>
@endif
<!-- Image Slider -->
@endsection
