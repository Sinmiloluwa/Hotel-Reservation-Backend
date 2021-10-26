@extends('layouts.content')

@section('content')
@include('layouts.navbar')
@if(Session::has('success'))
<div class="alert alert-success" id="alert">
    <strong>Success:</strong>
    {{Session::get('success')}}
</div>
@endif
    <!-- Listings -->
    <div class="container-fluid mt-5">
          <div class="text-center">
            <h3>Hotels</h3>
          </div>
        <div class="row gy-5 mt-5">
                <div class="col-md-3">
                <div class="form-box mt-5">
                    <form action="" method="POST">
                    <div class="form-group">
                      <label for="" class="text-white">City/State</label>
                      <input type="text" name="city" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="" class="text-white">Check-in-date</label>
                      <input type="date" name="check_in" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="" class="text-white">Check-out-date</label>
                      <input type="date" name="check_in" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <button type="submit" class="btn btn-primary form-control mt-3" style="background-color: #E65100;">Search</button>
                    </form>
                </div>
                <div class="filters mt-5">
                    <strong>Filter by: </strong>
                    <hr>
                    <p><strong>Attractions</strong></p>
                    @foreach($attractions as $attr)
                   <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="{{$attr->id}}"
                            id="flexCheckDefault"
                            name="attraction"
                        />
                        @if (in_array($attr->id, explode(',', request()->input('filter.attr'))))
                        checked
                        @endif
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$attr->name}}
                        </label>
                       
                    </div>
                    @endforeach

                    <hr>

                    <p><strong>Ratings</strong></p>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            5.0
                        </label>
                    </div>
                    <button type="button" id="filter" style="background-color: #E65100; color: white;" class="btn">Filter</button>
                </div>
               
                </div>
                <div class="col-md-9">
                  <div class="row">
                  @foreach($hotels as $hotel)
            <div class="col-md-3 mt-5">
                <div class="card" style="min-height: 350px;">
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
                    <div class="card-body"><a href="{{route('hotel.show', $hotel->id)}}" style="text-decoration: none; color: grey;">
                        <h4 class="card-title"><strong>{{ucfirst($hotel->name)}}</strong></h4>
                        <p class="card-text">{{$hotel->str_address}}</p>
                        <p class="card-text">{{$hotel->state}}</p>
                        
                    </div></a>
                </div>
            </div>
                @endforeach
                    
                  </div>
                </div>
            <!-- <div class="col-md-3 gx-3">
                <div class="form-box">
                    <form action="" method="POST">
                    <div class="form-group">
                      <label for="" class="text-white">City/State</label>
                      <input type="text" name="city" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="" class="text-white">Check-in-date</label>
                      <input type="date" name="check_in" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="" class="text-white">Check-out-date</label>
                      <input type="date" name="check_in" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <button type="submit" class="btn btn-primary form-control mt-3" style="background-color: #E65100;">Search</button>
                    </form>
                </div>
                <div class="filters mt-5">
                    <strong>Filter by: </strong>
                    <hr>
                    <p>Attractions</p>
                   <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            Default checkbox
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="row">
                @foreach($hotels as $hotel)
            <div class="col-md-3 mt-5">
            
                <div class="card">
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
                    <div class="card-body">
                        <h4 class="card-title"><strong>{{ucfirst($hotel->name)}}</strong></h4>
                        <p class="card-text">{{$hotel->str_address}}</p>
                        <p class="card-text">{{$hotel->state}}</p>
                    </div>
                </div>
                @endforeach
            </div> -->
            
        </div> 
    </div>