@section('noticeBoard')
<div class="container-fluid notice">
    <img class="img-fluid" src="{{ asset('website/img/board.png') }}" alt="">
    <div class="school-updates">
        <marquee behavior="" direction="up" onmouseover="stop();" onmouseout="start();" scrollamount="8">
            <div class="singleNew">
                <h3><a href="">Lorem ipsum dolor sit amet.</a></h3>
                <hr>
                <p class="text-right">posted on : 27 - 04 - 2019</p>
            </div>
            <div class="singleNew">
                <h3><a href="">Lorem ipsum dolor sit amet.</a></h3>
                <hr>
                <p class="text-right">posted on : 27 - 04 - 2019</p>
            </div>
            <div class="singleNew">
                <h3><a href="">Lorem ipsum dolor sit amet.</a></h3>
                <hr>
                <p class="text-right">posted on : 27 - 04 - 2019</p>
            </div>
        </marquee>
    </div>
</div>
@endsection
