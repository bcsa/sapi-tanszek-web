<!DOCTYPE html>
<html>
<head>

    <title>Fomco</title>
    <META NAME="robots" CONTENT="noindex,nofollow">

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.cdnfonts.com/css/raleway-5" rel="stylesheet">

    <link href="/css/web.css" rel="stylesheet">


</head>

<body class="checkout2-page">
<main>

    @include('layouts.header')

    <div class="bg-yellow">
        <div class="container">
            <div class="row hero-wrapper">
                <div class="col-12 col-md-6 my-auto text-center text-sm-start">
                    <h1 class="hero-title">
                        Finalizare comandă
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="">
            <div class="row my-5 justify-content-around">
                <div class="col-12 col-lg">
                    <div class="box">
                        <h2 class="col-8">Date personale</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nume" required>
                            <span class="label-input">Nume</span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="cnp" required>
                            <span class="label-input">CNP</span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="email" required>
                            <span class="label-input">Email</span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="telefon" required>
                            <span class="label-input">Telefon</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg mt-5 mt-lg-0">
                    <div class="box">
                        <h2 class="col-8">Date facturare</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" name="numefacturare" required>
                            <span class="label-input">Nume facturare</span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="codpostal" required>
                            <span class="label-input">Cod Poștal</span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="localitate" required>
                            <span class="label-input">Localitate</span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="address" required>
                            <span class="label-input">Strada, Adresă</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg mt-5 mt-lg-0">
                    <div class="box">
                        <h2 class="col-8">Date livrare</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nume" required>
                            <span class="label-input">Nume</span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="codpostal" required>
                            <span class="label-input">Cod Poștal</span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="localitate" required>
                            <span class="label-input">Localitate</span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="address" required>
                            <span class="label-input">Strada, Adresă</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 me-0 me-lg-5">
                    <div class="btn-order text-end mt-5">
                        <a href="" class="btn btn-yellow px-5 py-3">
                            Finalizare comandă
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('layouts.footer')

</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
