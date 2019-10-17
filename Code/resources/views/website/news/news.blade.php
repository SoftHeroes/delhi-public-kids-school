@section('news')
@php
    $year = (int)date("Y");
    $nextyear = substr((string)($year + 1),2,2);
    $nextyearInStr
@endphp
<!-- News heading -->
<br><br>
<div class="header-top-design-noColor">&nbsp;</div>
<div class="newHeadingBlock">
	<div class="newsheading text-center">Admission</div>
	<marquee behavior="scroll" scrollamount="5" onMouseOver="this.stop();" onMouseOut="this.start();" direction="left">
		<img src="{{ asset('website/img/title_icon.png') }}" alt="">
    <a href="{!! route('vAdmissionForm') !!}" class="news-title" style="text-decoration:none">Admissions for Playgroup, Nursery, KG-1, KG-2 are open for {{$year}}-{{$nextyear}} Please visit our campus..</a>
	</marquee>
</div>
<div class="header-top-design-noColor-rotated">&nbsp;</div>
<!-- News heading -->
@endsection
