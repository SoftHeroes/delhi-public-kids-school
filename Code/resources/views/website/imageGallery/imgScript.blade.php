@section('imageGalleryScripter')
@php
    use Illuminate\Support\Facades\DB;
    $count = DB::select('SELECT count(1) count FROM imageGallery WHERE deletedAt IS NULL')[0]->count;
@endphp

@for ($i = 1; $i <= $count; $i++)
    {{-- image gallery JS --}}
    <script type="text/javascript">
        $(document).ready(function () {
            let lightgalleryRef = $('#lightgallery{{$i}}');
            if(lightgalleryRef){
                lightgalleryRef.lightGallery();
            }
        });
    </script>
    {{-- image gallery JS --}}
@endfor
@endsection
