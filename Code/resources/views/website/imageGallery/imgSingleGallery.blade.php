@if ( isset($imagesArr) && isset($index) && isset($galleryName))
<div class="col-12 singleImageGallery">
    <h2 class="titleText" >{{$galleryName}}</h2>
<ul id="imageLightgallery{{$index}}" class="horizontal-slide list-unstyled">
    @foreach ($imagesArr as $currentImageRef)
    <li class="span" data-src="{{asset('/img/imageGallery/'.$currentImageRef) }}">
        <a href="">
            <div class="img-hover-zoom">
                <img class="img-responsive img-fluid" src="{{asset('/img/imageGallery/'.$currentImageRef) }}">
            </div>
        </a>
    </li>
    @endforeach
    </ul>
</div>
@endif
