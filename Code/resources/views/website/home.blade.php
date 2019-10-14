@extends('website.layouts.app')
@section('content')

@include('website.slider.slider')
@yield('slider')

@php
$PRTitle = 'About DPS Kids - Bhopal';
$PRSubTitle = 'Delhi Public Kids School is India’s fast-growing ISO 9001-2008 Certified chain of Hi-tech International Standard Montessori Pre-Schools. While maintaining the highest standards and quality of education.';
@endphp

@include('website.paragraph.paragraph')
@yield('paragraph')

<!-- News heading -->
<div class="header-top-design-noColor">&nbsp;</div>

<div class="newHeadingBlock">
    <div class="newsheading text-center">Admission</div>
    <marquee behavior="scroll" scrollamount="5" onMouseOver="this.stop();" onMouseOut="this.start();" direction="left">
        <img src="{{ asset('website/img/title_icon.png') }}" alt="">
        <a href="http://dpskidsbhopal.com" class="news-title" style="text-decoration:none">Admissions for Playgroup, Nursery, KG-1, KG-2 are open for 2019-20 Please visit our campus..</a>
    </marquee>
</div>
<div class="header-top-design-noColor-rotated">&nbsp;</div>
<!-- News heading -->

<!-- website Container -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-12">

                    @php
                    $PRTitle = 'Delhi Public Kids School';
                    $PRSubTitle = 'Delhi Public Kids School is India’s fast-growing ISO 9001-2008 Certified chain of Hi-tech International Standard Montessori Pre-Schools. While maintaining the highest standards and quality of education. We have spread our wings pan India with 200+ of Delhi Public Kids School, Delhi Public Secondary Schools, Delhi Public International School, Delhi Public Girls School. In Primary and Secondary segment, with 200 schools already in operation and many more in the making, DPSS is rewriting the history of school education in India . Some of our spectacular schools are already in operation in India. With the motto " ENCOURAGING CHILDREN TO DEVELOP THERE POTENTIAL AS LIFE LONG LEARNERS “ has pledged to provide the finest quality of education at affordable cost and create a society of progressively thinking individuals.';
                    @endphp

                    @include('website.paragraph.paragraph')
                    @yield('paragraph')

                    @php
                    $PRTitle = 'Our Mission';
                    $PRSubTitle = 'The Mount Carmel School prepares students to understand, contribute to, and succeed in a rapidly changing society, thus making the world a better and more just place. We will ensure that our students develop both the skills that a sound education provides and the competencies essential for success and leadership in the emerging creative economy. We will also lead in generating practical and theoretical knowledge that enables people to better understand our world and improve conditions for local and global communities.';
                    @endphp

                    @include('website.paragraph.paragraph')
                    @yield('paragraph')


                </div>
            </div>
        </div>
        <div class="col-md-4 woodBlock justify-content">
            <div class="row">
                <div class="col-12 text-center">
                    @include('website.noticeBoard.noticeBoard')
                    @yield('noticeBoard')

                    @include('website.wishBlock.wishBlock')
                    @yield('wishBlock')

                </div>
            </div>
        </div>
    </div>
</div>
<!-- website Container -->

@endsection
