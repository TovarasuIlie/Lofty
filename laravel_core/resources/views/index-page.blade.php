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

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@1&family=Playfair+Display:ital@1&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	
	<title>Lofty by Flory Cucu</title>
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
	          <a class="nav-link active" aria-current="page" href="/">Acasa</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/despre-noi">Despre Noi</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Servicii
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
	            <li><a class="dropdown-item" href="/made-to-measure">Made To Measure</a></li>
	            <li><a class="dropdown-item" href="/design-vestimentar">Design Vestimentar</a></li>
	            <li><a class="dropdown-item" href="/consultanta-vestimentara">Consultanta Vestimentare</a></li>
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
			<div class="container-fluid title-card">
				<div class="card text-white">
					<img src="{{ asset('assets/img/bg-index.jpg') }}" class="index-image">
					  <div class="card-img-overlay rounded-3" style="padding: 0px;">
					  	<div class="containter position-relative" style="height: 100%; background-color: rgb(0, 0, 0, 0.3);">
					  		<div class="index-text">
						    	<div class="container position-absolute top-50 start-50 translate-middle">
						    		<h1 class="text-uppercase" style="font-weight: bold;">Lofty by Flory Cucu</h1>
						    		<h6 class="text-uppercase" style="font-weight: 510;"><b>Dress Your Self. Your Best Self</b></h6>
						    	</div>
					    	</div>
						</div>
					 </div>
				</div>
			</div>
			<div class="container" style="font-size: 20px; padding-top: 50px;">
				<p>Da, da! Intră! Te așteptam! Bine ai venit la Lofty! Bem o cafea cât timp îmi poveștești ce vizezi să vezi în oglindă?</p>
				<p>Știu că prima tendiță este să spui că nu ai timp, că doar ai intrat "<i>să arunci o privire</i>". Noi, femeile, ne amăgim mult cu acest “doar arunc o privire”, nu-i așa? Când apare imboldul acesta, de fapt, atunci se naște un vis. <b>Hai să-l transformăm în realitate!</b></p>
				<p>Nu contează că nu ai încasat încă salariul, că nu ai slăbit, că lista priorităților e lungă și că mai ai haine din sezonul trecut. <b>Există soluții pentru orice!</b></p>
				<p><b>Azi este ziua în care te uiți în oglindă și îți dai voie să visezi!</b></p>
				<div class="row" style="margin: 50px 0 50px 0">
					<div class="col-lg-3" style="padding: 0;">
						<img src="{{ asset('assets/img/index1.jpg') }}" class="img-fluid h-100 w-100 rounded-3">
					</div>
					<div class="col-lg arhitecture">
						<div class="container">
							<h1 class="text-uppercase" style="margin-bottom: 100px;">Designer <b>Flory Cucu</b></h1>
							<p>Sunt Flory Cucu și pasiunea mea cea mai mare este să arăt fiecărei femei cât de frumoasă este, în hainele potrivite ei. Știi de ce? Pentru că eu însămi m-am amânat mult. Știu cum e! Am visat să pot crea haine pe sufletul meu și pentru încântarea celor din jur, dar am urmat, în schimb, acea listă a priorităților care ne fură mereu: un rost în viață, o carieră, un loc stabil, o relație perfectă… Am intrat, de prea multe ori, doar “să arunc o privire” acolo unde, de fapt, mi-aș fi dorit să rămân, să lucrez, să transform materialul în forme perfecte: în atelierul meu.</p>
						</div>
					</div>
				</div>
				<p><b>Când visul acesta a devenit realitate, mi-am promis să nu las pe nimeni să se amâne. Este cea mai costisitoare decizie!</b></p>
				<p>Așa că, hai! Să începem! <b>Lofty by Flory Cucu</b> este locul în care personalitatea ta își găsește cele mai potrivite haine! <b>Retransformă-te în ceea ce ți-ar plăcea să fii! Azi e prima zi în care nu te mai amâni.</b></p>
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