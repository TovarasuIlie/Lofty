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
			<div class="container">
				<h1 class="text-uppercase" style="margin-bottom: 100px;">Tinute <b>Lofty</b></h1>
				<div class="row row-cols-1 row-cols-md-3 g-4">
				  	<div class="col">
				   	 	<div class="card border-light">
				      		<img src="{{ asset('assets/img/outfits/rochie-cu-trena.jpg') }}" class="card-img-top" alt="...">
				      		<div class="card-body">
				        		<h5 class="card-title"><b>Rochia cu trenă</b></h5>
				        		<p class="card-text"><b>Everybody is a Cinderella</b> - este creația Lofty care demonstrează, încă o dată, că toate sișuetele sunt perfecte, în rochiile potrivite. Iar această rochie este menită a oferi starea de încredere oricărei femei, cu forme rubensiene, care o îmbracă. Realizată dintr-un material vaporos, acest model atrage privirile asupra celor mai feminine părți ale corpului – gât, decolteu și picioare, și ascunde discret zonele care pot crea complexe.</p>
				        		<p class="card-text">Everybody is a Cinderella este rochia care te va face să pășești plină de încredere în propria feminitate și să transformi complexele în atuuri. Cu atitudinea potrivită, vei fi senzația evenimentului!</p>
				      		</div>
				    	</div>
				  	</div>
				  	<div class="col">
				    	<div class="card border-light">
				      		<img src="{{ asset('assets/img/outfits/rochie-jumatate-neagra-jumatate-bleumarin.jpg') }}" class="card-img-top" alt="...">
				      		<div class="card-body">
				        		<h5 class="card-title"><b>Rochia jumatate neagra jumatate bleumarin</b></h5>
				        		<p class="card-text"><b>Dual You</b> –este rochia care reflectă propria ta dualitate – străluciotoare și misterioasă, exuberantă și rezervată, îndrăzneață și timidă. Ai curajul să fii exact așa cum ești – complexă, fabuloasă și greu de definit. Rochia Dual You este pentru zilele în care îți dorești să nu te încadrezi în tipare, în care vrei să ieși în evidență, fără a fi prinsă în vâltoarea conversațiilor. Este rochia care ăți va permite să schimbi abordările după bunul tău plac.</p>
				      		</div>
				    	</div>
				  	</div>
				  	<div class="col">
				    	<div class="card border-light">
				      		<img src="{{ asset('assets/img/outfits/costum-camasa-rosie-pantaloni-crem.jpg') }}" class="card-img-top" alt="...">
				      		<div class="card-body">
				        		<h5 class="card-title"><b>Costum cămașă roșie/pantaloni crem</b></h5>
				        		<p class="card-text">Transformă fiecare zi de lucru într-o oportunitate pentru a ieși în evidență, fără a plăti acel tribut al hainelor incomode. Fii îndrăzneață precum roșu, plutitoare precum mătasea și inspitată să pășești spre noi obiective, în fiecare zi.</p>
				        		<p class="card-text">Cămașa office din mătase (???)  și pantalonii lejeri, din stofă, sunt combinația ideală atât pentru zilele de lucru, la birou, cât și pentru întâlnirile de afaceri.</p>
				        		<p class="card-text">Cele două articole sunt potrivite oricărei siluete și oricărui moment al zilei și se asortează perfect cu pasiunea pentru propriul business.</p>
				      		</div>
				    	</div>
				  	</div>
				  	<div class="col">
				    	<div class="card border-light">
				      		<img src="{{ asset('assets/img/outfits/rochie-din-piele.jpg') }}" class="card-img-top" alt="...">
				      		<div class="card-body">
				        		<h5 class="card-title"><b>Rochia din piele</b></h5>
				        		<p class="card-text"><b>Just leather</b> – această rochie marca Lofty,creată exclusiv pe mărimile tale pentru a-ți îmbrăca trupul precum a doua piele, va spune despre tine exact ceea ce dorești să transmiți, fără să folosești cuvinte: că ești îndrăzneață și rebelă, elegantă și precaută – toate în același timp.</p>
				        		<p class="card-text">Rochia este confecționată din piele sintetica și poate fi purtată atât la petreceri, cât și la evenimente oficiale.</p>
				        		<p class="card-text">Îmbracă-ți pielea în piele și cucerește, plină de îndrăzneală. Succesul este al celor care știu ce vor!</p>
				      		</div>
				    	</div>
				  	</div>
				  	<div class="col">
				   	 	<div class="card border-light">
				      		<img src="{{ asset('assets/img/outfits/rochie-neagra-cu-centura-argintie.jpg') }}" class="card-img-top" alt="...">
				      		<div class="card-body">
				        		<h5 class="card-title"><b>Rochia neagra cu centura argintie</b></h5>
				        		<p class="card-text"><b>Midnight velvet</b> – este tot ce ai nevoie pentru a ieși în evidență și pentru a rămâne în amintirea celor care te văd. Creată din catifea fină, cu străluciri de apă sub clar de lună, Black Velvet este acea rochie-complice, care te va transforma în senzația serii. Nu ai nevoie de niciun alt accesoriu, în afara unui zâmbet încrezător și al unui parfum care să-ți contureze aerul de divă.</p>
				      		</div>
				    	</div>
				  	</div>
				  	<div class="col">
				    	<div class="card border-light">
				      		<img src="{{ asset('assets/img/outfits/rochie-neagra-cu-dantela.jpg') }}" class="card-img-top" alt="...">
				      		<div class="card-body">
				        		<h5 class="card-title"><b>Rochia neagra cu dantelă</b></h5>
				        		<p class="card-text"><b>Charcoal lace</b> – arată-te îndrăzneață, fără a dezvălui nimic din tainele tale. Această rochie te va învălui într-o aura de mister și semne de întrebare, făcându-I pe ceilalți să se întrebe cine ești, de fapt, și cum te pot aborda. Este rochia prin care îți manifești iubirea față de viață, dar prin care transmiți foarte clar limitele și spațiul personal.</p>
				      		</div>
				    	</div>
				  	</div>
				  	<div class="col">
				    	<div class="card border-light">
				      		<img src="{{ asset('assets/img/outfits/rochie-rosie-cu-trena.jpg') }}" class="card-img-top" alt="...">
				      		<div class="card-body">
				        		<h5 class="card-title"><b>Rochia rosie cu trena</b></h5>
				        		<p class="card-text"><b>Lady in red</b> – pentru că nu există colecție fără acea rochie roșie, pe care orice femeie ar trebui să o aibă în garderobă. Lady in red by Lofty este rochia învăluită în romantism, rochia unei seri perfecte, rochia promisiunilor în iubire. Este rochia care dezvăluie feminitatea, cu vulnerabilitățile dar și cu forța ei nebănuită, cu așteptări asumate, dar și cu darurile unice pe care doar o femeie le poate oferi celor din jur.</p>
				      		</div>
				    	</div>
				  	</div>
				  	<div class="col">
				    	<div class="card border-light">
				      		<img src="{{ asset('assets/img/outfits/salopeta-bleu.jpg') }}" class="card-img-top" alt="...">
				      		<div class="card-body">
				        		<h5 class="card-title"><b>Salopeta bleu</b></h5>
				        		<p class="card-text"><b>That you!</b> – combinația ideală dintre clasic și modern, dintre elegant și practic, dintre boem și îndrăzneț, dintre a fi relaxare și acțiune. Salopeta That you! By Lofty este cartea de vizită a acelui cumul de atuuri și calități, pe care le ai și pe care le dezvălui pe rând, de-a lungul unei zile.</p>
				        		<p class="card-text">Nu vei rămâne neremarcată purtând această creație aparte, care atrage privirile prin elementele antagonice, atât de frumos armonizate.</p>
				      		</div>
				    	</div>
				  	</div>
				  	<div class="col">
				   	 	<div class="card border-light">
				      		<img src="{{ asset('assets/img/outfits/bluza-roz.jpg') }}" class="card-img-top" alt="...">
				      		<div class="card-body">
				        		<h5 class="card-title"><b>Bluza roz</b></h5>
				        		<p class="card-text"><b>Magenta baby doll</b> – într-o nouă interpretare – modernă, practică, elegantă – pentru orice ocazie a zilei. Fie că mergi la birou sau la o întâlnire cu prietenele, fie că ai bilete la teatru sau pornești într-o plimbare relaxată pe străzile orașului, alături de cineva drag, bluza Baby Doll te cucerește prin versatilitate și prin linia fină, potrivită oricărei vârste și oricărei ocazii.</p>
				      		</div>
				    	</div>
				  	</div>
				</div>
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