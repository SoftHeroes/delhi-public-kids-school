@section('holidays')
@php
    use App\Providers\eventOfDay\event;

    $eventProvider = new event(null);
    $Events = $eventProvider->getTodayEvent();
@endphp
@isset($Events)
    @foreach ($Events as $currentEvent)
    <div class="wishBlock">
        <div class="birthdayWish">
            <h4 class="wishText"><i>Wish you a very happy </i><br><strong>{{$currentEvent->name}}</strong></h4>
            <p class="wishText"><i>{{$currentEvent->description}}</i></p>
        </div>
    </div>
    @endforeach
@endisset
@endsection
