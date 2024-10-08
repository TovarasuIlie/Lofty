<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    <!-- Boostrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0c4d35ef60.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/icons/site.webmanifest">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@1&family=Playfair+Display:ital@1&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- @livewireStyles --}}

    <title>{{ $title ?? 'Lofty by Flory Cucu' }}</title>
</head>

<body>
    <nav class="navbar navbar-index navbar-expand-lg navbar-dark bg-black sticky-top text-uppercase fw-bolder">
        <div class="container">
            <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/" wire:navigate>Acasa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('despre-noi') ? 'active' : '' }}" href="/despre-noi" wire:navigate>Despre Noi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Servicii
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/made-to-measure" wire:navigate>Made To Measure</a></li>
                            <li><a class="dropdown-item" href="/design-vestimentar" wire:navigate>Design Vestimentar</a></li>
                            <li><a class="dropdown-item" href="/consultanta-vestimentara" wire:navigate>Consultanta Vestimentare</a>
                            </li>
                            <li><a class="dropdown-item" href="/inchiriere-rochii" wire:navigate>Inchiriere Rochii</a></li>
                            <li><a class="dropdown-item" href="/atelier-croitorie-copii" wire:navigate>Atelier de Croitorie pentru
                                    Copii</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="/colaboranti" wire:navigate>Colaboranti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('galerie-foto') ? 'active' : '' }}" href="/galerie-foto" wire:navigate>Galerie Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact" wire:navigate>Contact</a>
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
            <div class="container" style="margin-top: 25vh;">
                <hr class="mx-auto" style="width: 70%;">
                <div class="d-grid sidebar-buttons">
                    <a class="btn btn-outline-light m-1" href="https://www.facebook.com/lofty.fashion.design"
                        role="button"><i class="fab fa-facebook-square"></i></a>
                    <a class="btn btn-outline-light m-1" href="https://www.instagram.com/lofty.fashion.design/"
                        role="button"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div id="content">
        {{ $slot }}
            <footer class="text-center text-lg-start text-white bg-black">
                <section class="p-4">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold mb-4"><i class="fas fa-gem me-3"></i>Lofty by Flory
                                    Cucu</h6>
                                <p>Tinute create special pentru tine: femeia activa, implicata, puternica!</p>
                                <a class="btn btn-outline-light m-1"
                                    href="https://www.facebook.com/lofty.fashion.design" role="button"><i
                                        class="fab fa-facebook-square"></i></a>
                                <a class="btn btn-outline-light m-1"
                                    href="https://www.instagram.com/lofty.fashion.design/" role="button"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Servici Online</h6>
                                <p><a href="/politica-magazin" class="text-reset" wire:navigate>Politica Magazin</a></p>
                                <p><a href="/politica-magazin#comenzile-si-platile" class="text-reset" wire:navigate>Comenzi si
                                        plati</a></p>
                                <p><a href="/politica-magazin#livrare-si-retur" class="text-reset" wire:navigate>Livrare si
                                        Retur</a></p>
                                <p><a href="/politica-magazin#confidentialitate"
                                        class="text-reset" wire:navigate>Confidentialitate</a></p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                                <p><i class="fas fa-home me-2"></i>Str. Vlad Dracul nr. 1, bloc B13, parter, Bucureşti
                                    Sectorul 3, Romania</p>
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
                    <p style="font-size: 13px;">&copy; 2023-<?php echo date('Y'); ?> Copyright. All Rights Reseved | by <a
                            href="https://www.instagram.com/niculai_ilie/"
                            style="text-decoration: none; font-weight: bold; color: white;" target="_blank">Niculai
                            Ilie-Traian</a> &copy;</p>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>
    </div>
    @livewireScripts
</body>
</html>
