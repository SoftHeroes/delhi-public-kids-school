@section('noticeBoard')
@php
use Illuminate\Support\Facades\DB;

$principalMessages = DB::select('SELECT * FROM principalMessages WHERE deletedAt IS NULL');
@endphp
<div class="container-fluid notice">
    <img class="img-fluid" src="{{ asset('website/img/board.png') }}" alt="">
    <div class="school-updates">
        <marquee behavior="" direction="up" onmouseover="stop();" onmouseout="start();" scrollamount="4">
            @isset($principalMessages)
                @foreach ($principalMessages as $currentPrincipalMessages)
                <div class="singleNew">
                    <h3><a href="{!! route('vPrincipalMessage') !!}">{{ substr($currentPrincipalMessages->title,0,24).'...'}}</a></h3>
                    <hr>
                    <p class="text-right">posted on : {{$currentPrincipalMessages->createDate}}</p>
                </div>
                @endforeach
            @endisset
        </marquee>
    </div>
</div>
@endsection
