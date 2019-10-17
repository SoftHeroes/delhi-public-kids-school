@section('navbar')

<!-- Navbar Bar -->
<nav class="navbar navbar-expand-sm navbar-dark mx-auto">
    <label class="navbar-brand">Menu</label>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><span class="icon fas fa-bars" style="color: white;"></span></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mx-auto mt-2 mt-lg-0 mt-lg-0">

            <li class="nav-item pr-md-0 pl-md-0 pr-lg-2.7 pl-lg-2.7">
                <a class="nav-link" href="{!! route('vHome') !!}">Home</a>
            </li>

            <li class="nav-item dropdown pr-md-0 pl-md-0 pr-lg-2.7 pl-lg-2.7">
                <a class="nav-link" href="{!! route('vPrincipalMessage') !!}">Principal Message</a>
            </li>

            <li class="nav-item dropdown pr-md-0 pl-md-0 pr-lg-2.7 pl-lg-2.7">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Academics</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="{!! route('vWeekSchedule') !!}">Week schedule</a>
                    <a class="dropdown-item" href="{!! route('vHomework') !!}">Homework</a>
                </div>
            </li>

            <li class="nav-item dropdown pr-md-0 pl-md-0 pr-lg-2.7 pl-lg-2.7">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gallery</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Image Gallery</a>
                    <a class="dropdown-item" href="#">Video Gallery</a>
                </div>
            </li>

            <li class="nav-item pr-md-0 pl-md-0 pr-lg-2.7 pl-lg-2.7">
                <a class="nav-link" href="{!! route('vFeesPay') !!}" target="_blank">Pay Fees</a>
            </li>

            <li class="nav-item pr-md-0 pl-md-0 pr-lg-2.7 pl-lg-2.7">
                <a class="nav-link" href="{!! route('vAdmissionForm') !!}">Admission Form</a>
            </li>

            <li class="nav-item pr-md-0 pl-md-0 pr-lg-2.7 pl-lg-2.7">
                <a class="nav-link" href="#">Contact us</a>
            </li>
        </ul>
    </div>
</nav>
<div class="slider-top-design">&nbsp;</div>
<!-- Navbar Bar -->
