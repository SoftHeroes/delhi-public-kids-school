@extends('website.layouts.app')
@section('content')
@php
    use Illuminate\Support\Facades\DB;
@endphp
<!-- website Container -->
<div class="container-fluid imgGalleryBlock">
    <div class="row">
        @php
        $imageGalleries = DB::select("SELECT * FROM imageGallery WHERE deletedAt IS NULL ORDER BY createDate DESC");
        $index = 1;
        @endphp
        @foreach ($imageGalleries as $imageGalleryRef)
            @php
                $imagesArr = array();
                $galleryName = null;
                $galleryName = $imageGalleryRef->name;
                $imagesArr = explode(',',$imageGalleryRef->imagesName);
            @endphp

            @include('website.imageGallery.imgSingleGallery')
            @yield('imgSingleGallery')
            @php $index++; @endphp

        @endforeach
    </div>
</div>
<!-- website Container -->
@endsection
