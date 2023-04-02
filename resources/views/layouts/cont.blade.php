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

<body class="cont-page">
<main>

    @include('layouts.header')

    <div class="bg-yellow">
        <div class="container">
            <div class="row hero-wrapper">
                <div class="col-12 col-md-5 my-auto text-center text-sm-start">
                    <h1 class="hero-title">
                        Intrare în cont
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row my-5 justify-space-between">
                        <div class="col-12 col-md">
                            <div class="login">
                                <div class="col-12">
                                    <h2>Înregistrează-te cu <br> un cont existent</h2>

                                    <form action="" autocomplete="off">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" required>
                                            <span class="label-input">Email</span>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" required>
                                            <a href="" class="input-helper">Ai uitat parola?</a>
                                            <span class="label-input">Parolă</span>
                                        </div>

                                        <div class="form-group text-end">
                                            <button type="submit" class="btn-auth">
                                                Înregistrează-te
                                                <img src="siteimg/icons/login.png">
                                            </button>
                                        </div>
                                    </form>
                                    <div class="col-12 mt-3 text-center">
                                        <span class="sau">
                                            SAU
                                        </span>

                                        <button class="btn btn-danger mt-3 btn-google">
                                            <img src="siteimg/icons/google.svg">Conectează-te cu contul Google
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md mt-5 mt-md-0 ">
                            <div class="register">
                                <div class="col-12">
                                    <h2>Creează un <br>cont nou</h2>

                                    <form action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nume" required>
                                            <span class="label-input">Nume</span>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" required>
                                            <span class="label-input">Email</span>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" required>
                                            <span class="input-helper">
                                                <img height="15px" class="" src="siteimg/icons/eye-solid.svg">
                                            </span>
                                            <span class="input-helper">
                                                <img height="15px" class="d-none" src="siteimg/icons/eye-slash-solid.svg">
                                            </span>
                                            <span class="label-input">Parolă</span>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password-confirm" required>
                                            <span class="input-helper">
                                                <img height="15px" class="" src="siteimg/icons/eye-solid.svg">
                                            </span>
                                            <span class="input-helper">
                                                <img height="15px" class="d-none" src="siteimg/icons/eye-slash-solid.svg">
                                            </span>
                                            <span class="label-input">Confirmă parola</span>
                                        </div>

                                        <div class="form-group text-end">
                                            <button type="submit" class="btn-auth">
                                                Creează cont
                                                <img src="siteimg/icons/login.png">
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
