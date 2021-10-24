<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Simons">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel Management</title>
	<!-- Font Awesome -->
	<link
  	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  	rel="stylesheet"
	/>
	<!-- Google Fonts -->
	<link
	  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
	  rel="stylesheet"
	/>
	<link 
	  href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" 
	  rel="stylesheet">
	<!-- MDB -->
	<link
	  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
	  rel="stylesheet"/>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="/css/main.css">
	 
	<!-- MDB -->
	<script
	  type="text/javascript"
	  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
	></script>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
	 <script src="/js/main.js"></script>
	 
</head>
<body>
	
    <main class="">
            @yield('content')
        </main>

<div class="container">
<hr>
</div>

		<div class="container">
<section id="footer" style="overflow: hidden;">
	<div class="row justify-content-center text-center">
		<div class="col-md-4">
			<ul>
				<li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
				<li><a href="">Services <i class="fa fa-angle-right"></i></a></li>
				<li><a href="">About <i class="fa fa-angle-right"></i></a></li>
				<li><a href="">Destinations <i class="fa fa-angle-right"></i></a></li>
			</ul>
		</div>
		<div class="col-md-4">
			<ul>
				<li><a href="">Home <i class="fa fa-angle-right"></i></a></li>
				<li><a href="">Services <i class="fa fa-angle-right"></i></a></li>
				<li><a href="">About <i class="fa fa-angle-right"></i></a></li>
				<li><a href="">Destinations <i class="fa fa-angle-right"></i></a></li>
			</ul>
		</div>
		<div class="col-md-4">
			<ul>
				<li><a href="">Home <i class="fa fa-angle-right"></i></a></li>
				<li><a href="">Services <i class="fa fa-angle-right"></i></a></li>
				<li><a href="">About <i class="fa fa-angle-right"></i></a></li>
				<li><a href="">Destinations <i class="fa fa-angle-right"></i></a></li>
			</ul>
		</div>
	</div>
</section>
</div>



<div class="text-center copyright">
	<strong>&copy; Oladejo and Co, 2021</strong>
</div>
       
<script type="text/javascript">
	$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>

<script>
    function getIds(checkboxName) {
        let checkBoxes = document.getElementsByName(checkboxName);
        let ids = Array.prototype.slice.call(checkBoxes)
                        .filter(ch => ch.checked==true)
                        .map(ch => ch.value);
        return ids;
    }

    function filterResults () {
        let attractionIds = getIds("attraction");

        let href = 'listings?';

        if(attractionIds.length) {
            href += 'filter[attraction]=' + attractionIds;
        }

        document.location.href=href;
    }

    document.getElementById("filter").addEventListener("click", filterResults);
</script>
        </body>
</html>    