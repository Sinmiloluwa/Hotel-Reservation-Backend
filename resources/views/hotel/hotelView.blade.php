@extends('layouts.content')

@section('content')
<!--Main Navigation-->
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"
            >Disabled</a
          >
        </li>
      </ul>
    </div>
  </div>
</nav>

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
            <div class="hotel-details gx-5">
            <div class="hotel-name mb-3" style="padding-left: 150px;">
                <h1><span>Hotel</span> {{$hotel->name}}</h1>
            </div>
            <div class="hotel-name" style="padding-left: 150px;">
                <h3><span class="text-bold" style="font-weight: bold;">Street Address:</span> {{$hotel->str_address}}</h3>
            </div>
            </div>
            
        </div>
    </div>
</div>