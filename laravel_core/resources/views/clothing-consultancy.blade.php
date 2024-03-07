<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Boostrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

	<!-- Boostrap JS & Popper -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/0c4d35ef60.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/img/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/img/icons/favicon-16x16.png">
	<link rel="manifest" href="assets/img/icons/site.webmanifest">
	
	<title>Consultanta Vestimentara - Lofty by Flory Cucu</title>
</head>
<body>
	<nav class="navbar navbar-index navbar-expand-lg navbar-dark bg-black sticky-top text-uppercase fw-bolder">
	  <div class="container">
	    <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link" href="/">Acasa</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/despre-noi">Despre Noi</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Servicii
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
	            <li><a class="dropdown-item" href="/made-to-measure">Made To Measure</a></li>
	            <li><a class="dropdown-item" href="/design-vestimentar">Design Vestimentar</a></li>
	            <li><a class="dropdown-item active" aria-current="page" href="/consultanta-vestimentara">Consultanta Vestimentare</a></li>
	            <li><a class="dropdown-item" href="/inchiriere-rochii">Inchiriere Rochii</a></li>
	            <li><a class="dropdown-item" href="/atelier-croitorie-copii">Atelier de Croitorie pentru Copii</a></li>
	          </ul>
	        </li>
<!-- 	        <li class="nav-item">
	          <a class="nav-link" href="/tinute">Tinute</a>
	        </li> -->
	        <li class="nav-item">
	          <a class="nav-link disabled" href="/colaboranti">Colaboranti</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/galerie-foto">Galerie Foto</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link disabled" href="/contact">Contact</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Magazin</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="wrapper">
		<div id="sidebar" class="bg-black">
			<div class="container sidebar-text">
				<hr class="mx-auto hr">
				<div class="vertical-writing text-uppercase mx-auto">Lofty by Flory Cucu</div>
				<hr class="mx-auto" style="width: 70%;">
			</div>
			<div class="container" style="margin-top: 30vh;">
				<hr class="mx-auto" style="width: 70%;">
				<div class="d-grid sidebar-buttons">
					<a class="btn btn-outline-light m-1" href="https://www.facebook.com/lofty.fashion.design" role="button"><i class="fab fa-facebook-square"></i></a>
					<a class="btn btn-outline-light m-1" href="https://www.instagram.com/lofty.fashion.design/" role="button"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="container">
				<h1 class="text-uppercase" style="margin-bottom: 50px;">Consultanta <b>Vestimentara</b></h1>
				<h2>Bine ai venit la <b>Lofty!</b></h2>
				<p>Suntem aici pentru a-ți oferi ghidare și încredere în călătoria ta către un stil vestimentar care să te reprezinte și să îți accentueze frumusețea naturală. La <b>Lofty</b>, ne specializăm în consultanță vestimentară personalizată pentru femei, ajutându-te să îți descoperi adevăratul stil și să îți conturezi garderoba perfectă.</p>
				<p><b>Ce oferim:</b></p>
				<ul>
					<li><b>Consultanță personalizată</b>: Fiecare femeie este unică, iar noi ne concentrăm pe nevoile și preferințele tale individuale pentru a-ți oferi sfaturi și sugestii adaptate.</li>
					<li><b>Analiză a tipului de siluetă</b>: Înțelegem că fiecare corp are forme și proporții unice, așa că îți oferim o analiză detaliată a tipului tău de siluetă pentru a identifica ce stiluri și croiuri de haine îți avantajează cel mai bine figura.</li>
					<li><b>Ghidare în alegerea ținutelor potrivite</b>: Te sprijinim în selecția hainelor, a culorilor și a accesoriilor care să îți pună în valoare trăsăturile și să te facă să te simți încrezătoare în orice ocazie.</li>
					<li><b>Consiliere în crearea unei garderobe versatile</b>: Te ajutăm să construiești o garderobă funcțională și versatilă, formată din piese de bază care se potrivesc cu stilul tău de viață și necesitățile tale zilnice.</li>
					<li><b>Încredere și susținere</b>: Echipa noastră de experți este aici pentru a te încuraja să îți exprimi creativitatea și să îți asumi riscuri în moda, oferindu-ți suportul de care ai nevoie pentru a străluci în fiecare zi.</li>
				</ul>
				<p>La <b>Lofty</b> credem că moda este o formă de exprimare a sinelui și că fiecare femeie merită să se simtă frumoasă și încrezătoare în propria piele. Hai să descoperim și să celebrăm frumusețea ta autentică!</p>
				<p>Pentru programări și mai multe informații, nu ezita să ne contactezi!</p>
			</div>
			<footer class="text-center text-lg-start text-white bg-black">
			  	<section class="p-4">
			    	<div class="container text-center text-md-start mt-5">
			      		<!-- Grid row -->
			      		<div class="row mt-3">
			        		<!-- Grid column -->
			        		<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
			          		<!-- Content -->
			          			<h6 class="text-uppercase fw-bold mb-4"><i class="fas fa-gem me-3"></i>Lofty by Flory Cucu</h6>
						        <p>Tinute create special pentru tine: femeia activa, implicata, puternica!</p>
						        <a class="btn btn-outline-light m-1" href="https://www.facebook.com/lofty.fashion.design" role="button"><i class="fab fa-facebook-square"></i></a>
								<a class="btn btn-outline-light m-1" href="https://www.instagram.com/lofty.fashion.design/" role="button"><i class="fab fa-instagram"></i></a>
			        		</div>
			        		<!-- Grid column -->

					        <!-- Grid column -->
					        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
					          	<!-- Links -->
					          	<h6 class="text-uppercase fw-bold mb-4">Servici Online</h6>
					          	<p><a href="/politica-magazin" class="text-reset">Politica Magazin</a></p>
					          	<p><a href="/politica-magazin#comenzile-si-platile" class="text-reset">Comenzi si plati</a></p>
					          	<p><a href="/politica-magazin#livrare-si-retur" class="text-reset">Livrare si Retur</a></p>
					          	<p><a href="/politica-magazin#confidentialitate" class="text-reset">Confidentialitate</a></p>
					        </div>
					        <!-- Grid column -->

					        <!-- Grid column -->
					        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
					          	<!-- Links -->
					          	<h6 class="text-uppercase fw-bold mb-4">Contact</h6>
					          	<p><i class="fas fa-home me-2"></i>Str. Vlad Dracul nr. 1, bloc B13, parter, Bucureşti Sectorul 3, Romania</p>
					          	<p><i class="fas fa-envelope me-2"></i>lofty.fashion.designs@gmail.com</p>
					          	<p><i class="fas fa-phone me-2"></i>0744 184 205</p>
					        </div>
					        <!-- Grid column -->
			      		</div>
			      		<!-- Grid row -->
			    	</div>
			  	</section>

			  	<!-- Copyright -->
			  	<div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
			  	  	<p style="font-size: 13px;">&copy; 2023-<?php echo date('Y'); ?> Copyright. All Rights Reseved | by <a href="https://www.instagram.com/niculai_ilie/" style="text-decoration: none; font-weight: bold; color: white;" target="_blank">Niculai Ilie-Traian</a> &copy;</p>
			  	</div>
			  	<!-- Copyright -->
			</footer>
			<!-- Footer -->
		</div>
	</div>
</body>
</html>