@extends('layouts.content')

@section('content')
<!--Main Navigation-->
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" target="_blank" href="https://mdbootstrap.com/docs/standard/">
          <strong>Hotel Reservation</strong>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="#intro">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services" rel="nofollow"
                >Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#destinations">Destinations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('hotel.list')}}">Hotels</a>
            </li>
          </ul>

          <ul class="navbar-nav list-inline">
            <!-- Icons -->
            <li class="">
              <a class="nav-link" href="" rel="nofollow"
                >
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li class="">
              <a class="nav-link" href="" rel="nofollow">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" rel="nofollow" >
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" rel="nofollow" >
                <i class="fab fa-github"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

<!-- Carousel wrapper -->
<section id="carousel">
<div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
        <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
      </ol>
       
      <!-- Inner -->
      <div class="carousel-inner home">
        <!-- Single item -->
        <div class="carousel-item active">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex  align-items-center justify-content-center h-100 w-100">
              <div class="text-white text-center">
                <h1 class="mb-3" style="font-weight: bold;">HOTEL GRANDEUR</h1>
                <h5 class="mb-4">Elegance in all Simplicity</h5>
                <a class="btn btn-outline-light btn-lg m-2" href="{{route('hotel.list')}}"
                  role="button" rel="nofollow" >Make a reservation</a>
              </div>
             
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h2 style="font-weight: bold;">OVERLOOKING THE OCEAN</h2>
                <a class="btn btn-outline-light btn-lg m-2"
                  href="{{route('hotel.list')}}"  role="button">Make a reservation</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="mask" style="
               background-color: rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h2 style="font-weight: bold">BEAUTIFUL SCENERY</h2>
                <a class="btn btn-outline-light btn-lg m-2"
                  href="{{route('hotel.list')}}" role="button">Make a reservation</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Inner -->

      <!-- Controls -->
      <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
        <span class="sr-only">Next</span>
      </a>

      
      </div>
    </div>
    <!-- Carousel wrapper -->
  </header>
  <!--Main Navigation-->
</section>



  <!-- Booking -->
  <div class="container" id="reservation">
  	 <div class="reservation mt-5 mb-3">
       		<div class="wrapper">
               <form method="POST" action="{{route('hotel.search')}}">
                   @csrf
       			<div class="row gx-2 needs-validation" novalidate>
                   @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                    @endif
                     <div class="col-md-3 gx-1">
              			<div class="form-group">
						  <label for="">Location</label>
						  <input type="text"
						    class="form-control" name="city" id="validationCustom01" aria-describedby="helpId" placeholder="Try Taiwo">
                            @error('city')
                                <div class="error error-danger">{{ $message }}</div>
                            @enderror
						</div>
              		</div>
              		<div class="col-md-3 gx-3">
              			<div class="form-group">
						  <label for="">Check In</label>
						  <input type="date"
						    class="form-control" name="check_in" id="" aria-describedby="helpId" placeholder="">
                            @error('city')
                                <div class="error">{{ $message }}</div>
                            @enderror
						</div>
              		</div>
              		<div class="col-md-3">
              			<div class="form-group">
						  <label for="">Check Out</label>
						  <input type="date"
						    class="form-control" name="check_out" id="" aria-describedby="helpId" placeholder="">
                            @error('city')
                                <div class="error">{{ $message }}</div>
                            @enderror
						</div>
              		</div>
              		<div class="col-md-3">
              			<div class="form-group">
						  <label for=""></label>
						  <button class="btn btn-secondary form-control" type="submit" style="background: #715306">Search Hotels</button>
						</div>
              		</div>
                       
              	</div>
               </form>
       		</div>
       	</div>
              	
              </div>


 <!-- Services -->
  <section id="services" class="mt-5">
  		<div class="service_header text-center">
  			<h1>Best Rates Yet</h1>
  		</div>
  		<div class="container">
  		<div class="row gx-5 text-center">
  			<div class="col-md-4 mb-4 mt-5">
  				<i class="fa fa-spa"></i>
  			</div>
  			<div class="col-md-4 mb-4 mt-5">
  				<i class="fa fa-wifi"></i>
  			</div>
  			<div class="col-md-4 mb-4 mt-5">
  				<i class="fa fa-bed"></i>
  			</div>

  		</div>
  	</div>
  </section>


  <!-- About -->
  <section id="about">
  	 <div id="main" class="mt-5">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 gx-5 mb-4">
  				 <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
              		<img src="img/pexels-konstantinos-eleftheriadis-2034335.jpg" class="img-fluid" />
              		<a href="#!">
                	<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              		</a>
            	</div>
            </div>
		            <div class="col-md-6 gx-5 mb-4">
		            <h4><strong>About Us</strong></h4>
		            <p class="text-muted">
		              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur
		              eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum
		              sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.
		            </p>
		            <p><strong>Doloremque vero ex debitis veritatis?</strong></p>
		            <p class="text-muted">
		              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod itaque voluptate
		              nesciunt laborum incidunt. Officia, quam consectetur. Earum eligendi aliquam illum
		              alias, unde optio accusantium soluta, iusto molestiae adipisci et?
		            </p>
          </div>
  			</div>
  		</div>
  	</div>
  </section>
 

  <!-- Partners -->
<section id="partners">
	<div class="container">
		<div class="service_header text-center mb-5">
  			<h1>Partners</h1>
  		</div>
  		<section class="customer-logos slider">
      <div class="slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
      <div class="slide"><img src="http://www.webcoderskull.com/img/logo.png"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg"></div>
   </section>
	</div>
</section>


<!-- Destinations -->
<div class="container">
<section id="destinations" class="wrappers">
	<div class="service_header text-center mb-5">
  			<h1>Destinations</h1>
  		</div>
  <div class="container">
  
  <div class="row">
 <div class="col-md-4"><div class="card text-white card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tech,street');">
         <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
        <div class="card-img-overlay d-flex flex-column">
         <div class="card-body">
            <small class="card-meta mb-2">Thought Leadership</small>
            <h4 class="card-title mt-0 "><a class="text-white about" herf="#">Goverment Lorem Ipsum Sit Amet Consectetur dipisi?</a></h4>
           <small><i class="far fa-clock"></i> October 15, 2020</small>
          </div>
       
        </div>
      </div></div>
     <div class="col-md-4"><div class="card text-white card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tree,nature');">
         <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tree,nature" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
        <div class="card-img-overlay d-flex flex-column">
         <div class="card-body">
            <small class="card-meta mb-2">Thought Leadership</small>
            <h4 class="card-title mt-0 "><a class="text-white about" herf="#">Goverment Lorem Ipsum Sit Amet Consectetur dipisi?</a></h4>
           <small><i class="far fa-clock"></i> October 15, 2020</small>
          </div>
          
        </div>
      </div></div>
  <div class="col-md-4"><div class="card text-white card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?computer,design');">
         <img class="card-img d-none" src="https://source.unsplash.com/600x900/?computer,design" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
        <div class="card-img-overlay d-flex flex-column">
         <div class="card-body">
            <small class="card-meta mb-2">Thought Leadership</small>
            <h4 class="card-title mt-0 "><a class="text-white about" herf="#">Goverment Lorem Ipsum Sit Amet Consectetur dipisi?</a></h4>
           <small><i class="far fa-clock"></i> October 15, 2020</small>
          </div>
         
        </div>
      </div></div>
  
</div>
  
</div>
</section>


</div>







 


<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>


@endsection
