<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Lofty by Flory Cucu</title>

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/style.css') }}">

    <!-- Boostrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0c4d35ef60.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@1&family=Playfair+Display:ital@1&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <img src="" class="rounded mx-auto d-block w-100" id="img-modal">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mark-finished-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Status comanda #{{ $order->ID }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esti sigur ca doresti sa finalizezi aceasta comanda lui <b>{{ $order->fullname }}</b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Inchide</button>
                    <a href="/dashboard/made-to-measure/comenzi-noi/comanda/markFinished/{{ $order->ID }}" type="button" class="btn btn-success btn-sm">Finalizare comanda!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="unmark-finished-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Status comanda #{{ $order->ID }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esti sigur ca doresti sa readuci in lucru aceasta comanda lui <b>{{ $order->fullname }}</b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Inchide</button>
                    <a href="/dashboard/made-to-measure/comenzi-noi/comanda/unmarkFinished/{{ $order->ID }}" type="button" class="btn btn-warning btn-sm">Schimba status!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cancel-order-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Anulezi comanda #{{ $order->ID }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esti sigur ca doresti sa anulezi aceasta comanda lui <b>{{ $order->fullname }}</b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Inchide</button>
                    <button type="button" class="btn btn-danger btn-sm">Anuleaza!</button>
                </div>
            </div>
        </div>
    </div>

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/">Lofty by Flory Cucu</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav d-inline-block form-inline ms-auto me-2 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/dashboard/logare/logout">Delogheaza-te</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link" aria-current="page" href="/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Made To Measure</div>
                        <a class="nav-link active" aria-current="page" href="/dashboard/made-to-measure/comenzi-noi">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
                            Comenzi Noi
                        </a>
                        <a class="nav-link" href="/dashboard/made-to-measure/comenzi-finalizate">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-check"></i></div>
                            Comenzi Finalizate
                        </a>
                        @can('is-manager')
                        <div class="sb-sidenav-menu-heading">Owner Area</div>
                        <a class="nav-link" href="/dashboard/conturi/gestionare-conturi">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Gestionare Conturi
                        </a>
                        <a class="nav-link" href="/dashboard/conturi/link-creare-cont">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Link Creare Conturi
                        </a>
                    @endcan
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Loghat ca:</div>
                {{ auth()->user()->name }}
            </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 mb-5">Detalii comanda ID #{{ $order->ID }}</h1>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="text-uppercase">Date de <b>Contact</b></h2>
                                <p class="mb-3 fs-3" style="text-indent: 50px;">Numele si prenumele: <b>{{ $order->fullname
                                        }}</b></p>
                                <p class="mb-3 fs-3" style="text-indent: 50px;">Adresa de email: <b>{{ $order->email }}</b></p>
                                <p class="mb-3 fs-3" style="text-indent: 50px;">Numarul de telefon: <b>{{ $order->phoneNumber
                                        }}</b></p>
                                <p class="mb-3 fs-3 mx-5">Status comanda: 
                                    @if(!$order->finished) 
                                        <span class="badge bg-danger">Nefinalizata</span> 
                                    @else
                                        <span class="badge bg-success">Finalizata</span> 
                                    @endif
                                </p>
                            </div>
                            <div class="col-md d-flex flex-column gap-3">
                                <h2 class="text-uppercase">Admin <b>Area</b></h2>
                                @if(!$order->finished) 
                                <button type="button" data-bs-toggle="modal" data-bs-target="#mark-finished-modal" class="btn btn-lg btn-success">Marcheaza ca Finalizat</button>
                            @else 
                                <button type="button" data-bs-toggle="modal" data-bs-target="#unmark-finished-modal" class="btn btn-lg btn-warning">Marcheaza ca Nefinalizat</button>
                            @endif
                                <button type="button" data-bs-toggle="modal" data-bs-target="#cancel-order-modal" class="btn btn-lg btn-danger">Anuleaza Comanda</button>
                            </div>
                        </div>
                        <hr>
                        <h3 class="text-uppercase mb-5">Masuri <b>Personalizate</b></h3>
                        <div class="row">
                            <div class="col-xl">
                                <img src="{{ asset('assets/img/made-to-measure.jpg') }}"
                                    class="img-fluid rounded mx-auto d-block made-to-measure-img" alt="...">
                            </div>
                            <div class="col-xl">
                                <div class="mb-3 fs-3">
                                    <p><b>1</b>. Inaltime: <b style="text-decoration: underline;">{{ $order->height
                                            }}</b> cm</p>
                                </div>
                                <hr>
                                <div class="mb-3 fs-3">
                                    <p><b>2</b>. Circumferinta Bustului: <b style="text-decoration: underline;">{{
                                            $order->bustCircumference }}</b> cm</p>
                                </div>
                                <hr>
                                <div class="mb-3 fs-3">
                                    <p><b>3</b>. Circumferinta sub bust: <b style="text-decoration: underline;">{{
                                            $order->circumferenceUnderTheBust }}</b> cm</p>
                                </div>
                                <hr>
                                <div class="mb-3 fs-3">
                                    <p><b>4</b>. Circumferinta talie: <b style="text-decoration: underline;">{{
                                            $order->waistCircumference }}</b> cm</p>
                                </div>
                                <hr>
                                <div class="mb-3 fs-3">
                                    <p><b>5</b>. Circumferinta solduri: <b style="text-decoration: underline;">{{
                                            $order->hipsCircumference }}</b> cm</p>
                                </div>
                                <hr>
                                <div class="mb-3 fs-3">
                                    <p><b>6</b>. Lungime brat: <b style="text-decoration: underline;">{{
                                            $order->armLength }}</b> cm</p>
                                </div>
                                <hr>
                                <div class="mb-3 fs-3">
                                    <p><b>7</b>. Lungime pe interiorul piciorului: <b
                                            style="text-decoration: underline;">{{ $order->insideLengthLeg }}</b> cm</p>
                                </div>
                                <hr>
                                <div class="mb-3 fs-3">
                                    <p><b>8</b>. Latime umeri: <b style="text-decoration: underline;">{{
                                            $order->shoulderWidth }}</b> cm</p>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <h3 class="text-uppercase" style="margin-bottom: 30px; margin-top: 50px;">Imagine
                            <b>Orientativa</b></h3>
                        <div class="row" id="order-images">
                            @if(isset($order->photo1))
                            <div class="col-xl-4 mb-5">
                                <div
                                    class="container container-preview px-0 d-flex align-items-center justify-content-center">
                                    <img src="{{ $order->photo1 }}"
                                        class="image w-100 shadow-1-strong rounded object-fit-made">
                                    <div class="overlay rounded">
                                        <div class="text"><i class="fas fa-search-plus"></i></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(isset($order->photo2))
                            <div class="col-xl-4 mb-5">
                                <div
                                    class="container container-preview px-0 d-flex align-items-center justify-content-center">
                                    <img src="{{ $order->photo2 }}"
                                        class="image w-100 shadow-1-strong rounded object-fit-made">
                                    <div class="overlay rounded">
                                        <div class="text"><i class="fas fa-search-plus"></i></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(isset($order->photo3))
                            <div class="col-xl-4 mb-5">
                                <div
                                    class="container container-preview px-0 d-flex align-items-center justify-content-center">
                                    <img src="{{ $order->photo3 }}"
                                        class="image w-100 shadow-1-strong rounded object-fit-made">
                                    <div class="overlay rounded">
                                        <div class="text"><i class="fas fa-search-plus"></i></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>