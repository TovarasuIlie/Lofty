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

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body p-4">
                    <img src="{{ asset('/assets/img/dashboard/logo.jpg') }}" alt="" class="img-fluid logo-img img-thumbnail">
                    <h5 class="mb-3 text-center">Inregistrare cont Administrator</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger mb-3" style="max-width: 330px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="/dashboard/inregistrare/register">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nume..." value="{{ old('fullname') }}">
                            <label for="fullname">Nume Complet</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ session()->get('email') }}" readonly>
                            <label for="email">Adresa de email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Parola...">
                            <label for="password">Parola</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirma Parola...">
                            <label for="confirm-password">Confirma Parola</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="PIN" name="PIN" placeholder="1234">
                            <label for="PIN">PIN</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirm-PIN" name="confirm-PIN" placeholder="1234">
                            <label for="confirm-PIN">Confirmare PIN</label>
                        </div>
                        <button class="btn btn-outline-success w-100">Inregistreza cont!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>