@isset($homeworks)
    @foreach ($homeworks as $currentHomework)
    <div class="row singleNoticeBlock">
        <div class="col-sm-6 postDate"><i>Posted On : </i><strong>{{$currentHomework->createDate}}</strong></div>
        <div class="col-sm-6 postDate text-right"><i>Homework Date : </i><strong> {{$currentHomework->dateOfHomework}}</strong></div>
        <div class="col-12">
            <hr>
        </div>
        @php
            $isTextIsNull = ( is_null($currentHomework->text) || trim($currentHomework->text) == '');
            $isImgIsNull  = ( is_null($currentHomework->imageName) || trim($currentHomework->imageName) == '');
        @endphp
        @if ( ! $isTextIsNull )
        <div class=" {{$isImgIsNull ? 'col-12' : 'col-md-6'}}">
            <p>{!! nl2br(e($currentHomework->text)) !!}</p>
        </div>
        @endif

        @if ( ! $isImgIsNull )
        <div class="{{$isTextIsNull ? 'col-12' : 'col-md-6'}}">
            <img class="img-fluid" src="{{asset('/img/homework/'.$currentHomework->imageName) }}" alt="">
        </div>
        @endif
    </div>
    @endforeach
@endisset
