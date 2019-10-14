@section('slider')

<!-- Image Slider -->
<div id="slides" class="carousel slide slider" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
        <li data-target="#slides" data-slide-to="3"></li>
        <li data-target="#slides" data-slide-to="4"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="img-fluid" src="{{ asset('website/img/slider/S_1.jpg') }}">
        </div>
        <div class="carousel-item">
            <img class="img-fluid" src="{{ asset('website/img/slider/S_2.jpg') }}">
        </div>
        <div class="carousel-item">
            <img class="img-fluid" src="{{ asset('website/img/slider/S_3.jpg') }}">
        </div>
        <div class="carousel-item">
            <img class="img-fluid" src="{{ asset('website/img/slider/S_4.jpg') }}">
        </div>
        <div class="carousel-item">
            <img class="img-fluid" src="{{ asset('website/img/slider/S_5.jpg') }}">
            <div class="carousel-caption">
                <h3>First slide</h3>
                <p>This is the first slide.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev"><span class="fas fa-chevron-left"></span></a>
    <a class="carousel-control-next" href="#slides" role="button" data-slide="next"><span class="fas fa-chevron-right"></span></a>
    </a>
</div>
<!-- Image Slider -->
@endsection
