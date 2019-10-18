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

@include('website.news.news')
@yield('news')

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
			<div class="row serviceBlock text-center justify-content-md-center">
				<a href="{!! route('vImageGallery') !!}" class="col-sm-4 col-md-6 col-lg-4">
					<span class="fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x text-primary"></i>
					<i class="fas fa-image fa-stack-1x fa-inverse"></i>
					</span>
					<h4>Image Gallery</h4>
				</a>
				<a href="{!! route('vVideoGallery') !!}" class="col-sm-4 col-md-6 col-lg-4">
					<span class="fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x text-primary"></i>
					<i class="fas fa-film fa-stack-1x fa-inverse"></i>
					</span>
					<h4>Video Gallery</h4>
				</a>
				<a href="{!! route('vFeesPay') !!}" target="_blank" class="col-sm-4 col-md-6 col-lg-4">
					<span class="fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x text-primary"></i>
					<i class="fas fa-credit-card fa-stack-1x fa-inverse"></i>
					</span>
					<h4>Pay fees</h4>
                </a>
            </div>
            <br>
            <div class="row paragraphBlock">
                <div class="title col-12">What we offer</div>
                <hr>
                <ul class="col-12">
                    <li class="subText" >Own syllabus of delhi public school(p)ltd.</li>
                    <li class="subText" >education with culture & civilization.</li>
                    <li class="subText" >activity based integrated curriculum.</li>
                    <li class="subText" >teacher training by professional trainer.</li>
                    <li class="subText" >montessori & play way audio visual teaching method.</li>
                    <li class="subText" >co-curricular activities such as yoga, dance/sports/arts & craft.</li>
                    <li class="subText" >parent teacher co-ordination.</li>
                    <li class="subText" >cctv in classes.</li>
                    <li class="subText" >non toxic montessori material and activity based classrooms.</li>
                    <li class="subText" >quatified, friendly & expreience staff.</li>
                    <li class="subText" >idol student teacher ratio.</li>
                    <li class="subText" >fun & safe environment.</li>
                    <li class="subText" >smart class with audio visuals screen.</li>
                    <li class="subText" >theme based class rooms.</li>
                    <li class="subText" >special focus on communicaltions and personality development.</li>
                    <li class="subText" >individual caring and counseling.</li>
                    <li class="subText" >rto approved school van.</li>
                    <li class="subText" >van with female caring staff.</li>
                    <li class="subText" >computer awareness from early stage.</li>
                    <li class="subText" >regular doctor's check-up.</li>
                </ul>
			</div>
		</div>
		<div class="col-md-4 woodBlock justify-content">
			<div class="row">
				<div class="col-12 text-center">
					@include('website.noticeBoard.noticeBoard')
					@yield('noticeBoard')
					@include('website.wishBlock.wishBlock')
                    @yield('wishBlock')
                    @include('website.wishBlock.holidays')
					@yield('holidays')
				</div>
			</div>
		</div>
	</div>
</div>
<!-- website Container -->
@endsection
