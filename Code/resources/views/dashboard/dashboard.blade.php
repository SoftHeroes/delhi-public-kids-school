@extends('dashboard.layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        <p>All today's related event is shown here!!</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body col-md-12">
                <div class="row">
                    @isset($BirthDays)
                        @foreach ($BirthDays as $currentBirthDays)
                            <div class="col-md-4 text-center">
                                <div class="card" >
                                    <div class="card-header">
                                        <h5 class="Display"><i>Wish you a very happy birthday</i> <strong>{{$currentBirthDays->fname}}</strong></h5>
                                    </div>
                                    <div class="card-body">
                                        <img class="img-fluid" src="{{ asset("img/student/".$currentBirthDays->imageName) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                    @isset($Events)
                        @foreach ($Events as $currentEvent)
                            <div class="col-md-4 text-center">
                                <div class="card" >
                                    <div class="card-header">
                                        <h5 class="Display">{{$currentEvent->name}}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="Display2" style="padding: 1rem">{{$currentEvent->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <br><br>
                <i class="text-center" style="color: gray"><p>Sorry no more events for today NOW!.</p></i>
            </div>
        </div>
    </div>
</div>
@endsection
