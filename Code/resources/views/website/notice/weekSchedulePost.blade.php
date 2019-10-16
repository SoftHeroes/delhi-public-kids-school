@isset($weekSchedules)
    @foreach ($weekSchedules as $currentWeekSchedule)
    <div class="row singleNoticeBlock">
        <div class="col-sm-6 postDate"><i>Posted On : </i><strong>{{$currentWeekSchedule->createDate}}</strong></div>
        <div class="col-sm-6 postDate text-right"><i>Week : </i><strong> {{$currentWeekSchedule->startDate . ' - ' .$currentWeekSchedule->endDate}}</strong></div>
        <div class="col-12">
            <hr>
        </div>
        @php
            $isTextIsNull = ( is_null($currentWeekSchedule->text) || trim($currentWeekSchedule->text) == '');
            $isImgIsNull  = ( is_null($currentWeekSchedule->imageName) || trim($currentWeekSchedule->imageName) == '');
        @endphp
        @if ( ! $isTextIsNull )
        <div class=" {{$isImgIsNull ? 'col-12' : 'col-md-6'}}">
            <p>{!! nl2br(e($currentWeekSchedule->text)) !!}</p>
        </div>
        @endif

        @if ( ! $isImgIsNull )
        <div class="{{$isTextIsNull ? 'col-12' : 'col-md-6'}}">
            <img class="img-fluid" src="{{asset('/img/weekSchedule/'.$currentWeekSchedule->imageName) }}" alt="">
        </div>
        @endif
    </div>
    @endforeach
@endisset
