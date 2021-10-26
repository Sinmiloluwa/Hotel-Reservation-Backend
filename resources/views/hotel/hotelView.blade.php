@extends('layouts.content')

@section('content')
@include('layouts.navbar')

<div class="container">
    <div class="row justify-content-between">
        <div class="col-md-6">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-mdb-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img
                        src="{{asset('img/h1.jpg')}}"
                        class="d-block w-100"
                        alt="..."
                    />
                    </div>
                    <div class="carousel-item">
                    <img
                        src="{{asset('img/h2.jpg')}}"
                        class="d-block w-100"
                        alt="..."
                    />
                    </div>
                    <div class="carousel-item">
                    <img
                        src="{{asset('img/h3.jpg')}}"
                        class="d-block w-100"
                        alt="..."
                    />
                    </div>
                </div>
                </div>
        </div>
        <div class="col-md-6">
            <div class="hotel-details gx-5" style="padding-left: 150px;">
            <div class="hotel-name mb-3">
                <h1><span>Hotel</span> {{$hotel->name}}</h1>
            </div>
            <div class="hotel-name">
                <h3><span class="text-bold" style="font-weight: bold;">Street Address:</span> {{$hotel->str_address}}</h3>
            </div>
            <div class="rating">
                <h3><span class="text-bold" style="font-weight: bold;">State: </span>{{$hotel->state}} </h3>
            </div>
            <div class="rating">
                <h3><span class="text-bold" style="font-weight: bold;">Reviews: </span> <i class="fa fa-star"></i></h3>
            </div>
            
            <div class="row justify-content-end">
              <a href="{{route('reservation.home',$hotel->id)}}" class="btn btn-primary" role="button" style="width: 200px;">Make a Reservation</a>
            </div>
           
            </div>
            
        </div>
    </div>
</div>