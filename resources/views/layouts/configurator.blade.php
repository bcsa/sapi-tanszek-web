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

<body class="configurator-page">
<main>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row bg-yellow hero-1">
            <div class="col p-0 my-auto">
                <div class="rest-wrapper-left rest-wrapper-left-5 text-center text-md-start ">
                    <h1 class="hero-title">
                        Configurator
                    </h1>
                </div>
            </div>
            <div class="col-12 col-sm-7 p-0 configurator-page-hero">
            </div>
        </div>
    </div>

    <div class="calculator-wrapper">
        <div class="container">
            <iframe src="/" id="child-iframe" width="100%" style="overflow: hidden"></iframe>
        </div>
        <script>
            let iframe = document.querySelector("#child-iframe")
            let minH = null

            window.addEventListener('message', (e) => {
                let message = e.data
                if (!minH) {
                    minH = message.height
                }

                if (message.height >= minH) {
                    iframe.style.height = message.height + 'px'
                }
            }, false)
        </script>
    </div>

    <div class="oferta-wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-4">
                    <h2>Completează formularul pentru o ofertă personalizată</h2>
                </div>
                <div class="col-12 col-md-4 offset-md-4">
                    form here
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
