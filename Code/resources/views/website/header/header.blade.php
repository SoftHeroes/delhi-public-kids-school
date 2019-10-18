@section('header')

<div class="header-top-design">&nbsp;</div>

<!-- Heading Bar -->
<div class="container-fluid headingBar">
    <div class="row">
        <div class="col-6 col-md-2 align-self-center logo">
            <a href="{!! route('vHome') !!}">
                <img src="{{ asset('website/img/logo.png') }}" alt="">
            </a>
        </div>
        <div class="col-0 col-md-8 align-self-center text-center headCenterText">
            <div class="row">
                <div class="col-12 schName">
                    DELHI PUBLIC KIDS SCHOOL
                </div>
                <div class="col-12 schSubHeading">
                    (A Unit of Delhi Public School (P) Ltd. 280+ School in india)
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2 align-self-center text-right">
            <a href="https://dpspl.com" target="_blank">
                <img style="width: 75px" src="{{ asset('website/img/logoDPSPL.png') }}" alt="">
            </a>
        </div>
    </div>
</div>
<!-- Heading Bar -->
@endsection
