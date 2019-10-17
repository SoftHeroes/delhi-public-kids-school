@if ( isset($imagesArr) && isset($index) && isset($galleryName))
<div class="col-12 singleImageGallery">
    <h2 class="titleText" >{{$galleryName}}</h2>
<ul id="lightgallery{{$index}}" class="horizontal-slide list-unstyled">
    @foreach ($imagesArr as $currentImageRef)
    <li class="span" data-src="{{asset('/img/imageGallery/'.$currentImageRef) }}">
        <a href="">
            <img class="img-responsive img-fluid" src="{{asset('/img/imageGallery/'.$currentImageRef) }}">
        </a>
    </li>
    @endforeach
    </ul>
</div>
@endif
