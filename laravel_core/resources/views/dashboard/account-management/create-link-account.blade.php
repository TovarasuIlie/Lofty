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
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/">Lofty by Flory Cucu</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav d-inline-block form-inline ms-auto me-2 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown float-end">
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
                        <a class="nav-link" href="/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Made To Measure</div>
                        <a class="nav-link" href="/dashboard/made-to-measure/comenzi-noi">
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
                    <h1 class="mt-4">Creare Link</h1>
                    <div class="container mt-2 p-5">
                        <div class="container-md mb-5 align-items-center justify-content-center">
                            <form action="/dashboard/conturi/link-creare-cont/generateAccountToken" method="POST">
                                @csrf
                                <p>Pentru a crea un nou cont, va trebui sa generezi un link de creare a contului. Pentru a genera link-ul, trebuie ca persoana respectiva sa iti dea o <b>adresa de email valida</b>. Link-ul o sa il primeasca pe email.</b> Link-ul va fi valabil <b>10 minute!</b>.</b></p>
                                @if ($errors->any())
                                    <div class="alert alert-danger mb-3">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{!! $error !!}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session()->has('success'))
                                    <div class="alert alert-success mb-3">
                                        <ul>
                                                <li>{!! session()->get('success') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger mb-3">
                                        <ul>
                                                <li>{!! session()->get('error') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <div class="mb-3 w-75 mx-auto">
                                    <label for="exampleInputEmail1" class="form-label">Adresa de email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        aria-describedby="emailHelp" placeholder="user@example.com">
                                    <div id="emailHelp" class="form-text">Ai grija ca emal-ul sa fie corect.</div>
                                    <button type="submit" class="btn btn-primary mt-3">Generare Link!</button>
                                </div>
                            </form>
                        </div>
                        <table class="table table-striped text-center">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Generat la</th>
                                <th scope="col">Generat de</th>
                                <th scope="col">Expira la</th>
                                <th scope="col">Actiuni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($createdLinks) > 0)
                                    @foreach($createdLinks as $link)
                                    <tr>
                                        <th>{{ $link->email }}</th>
                                        <th>{{ $link->generated_by }}</th>
                                        <td>{{ $link->generated_at }}</td>
                                        <td>{{ $link->expiration_at }}</td>
                                        <td>
                                            <a href="{{ asset('/dashboard/conturi/link-creare-cont/destroyLink/'.$link->id) }}" class="btn btn-sm btn-danger">Sterge Token!</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="6">Momentan nu este generat nici un link.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
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