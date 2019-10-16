@section('wishBlock')
@php
$Birthdays = DB::select("SELECT * FROM students WHERE DAYOFYEAR(dateOfBirth) = DAYOFYEAR(CURRENT_DATE())");
@endphp
@isset($Birthdays)
    @foreach ($Birthdays as $currentBirthday)
    <div class="wishBlock">
        <div class="birthdayWish">
            <img class="img-fluid sparkles" src="{{ asset('website/img/sparkles.gif') }}" alt="">
            <h4 class="wishText"><i>Wish you a very happy birthday</i><br><strong>{{$currentBirthday->fname}}</strong></h4>
            <img class="img-fluid" src="{{ asset("img/student/".$currentBirthday->imageName) }}" alt="">
        </div>
    </div>
    @endforeach
@endisset
@endsection
