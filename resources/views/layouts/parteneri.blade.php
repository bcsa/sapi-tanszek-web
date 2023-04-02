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

<body class="parteneri-page">
<main>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row bg-yellow">
            <div class="col p-0 my-auto">
                <div class="rest-wrapper-left rest-wrapper-left-5 text-center text-md-start ">
                    <h1 class="hero-title">Parteneri</h1>
                </div>
            </div>
            <div class="col-12 col-md-7 p-0 parteneri-page-hero">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container mt-10 mb-5">
                    <div class="row boxed mb-3 text-center text-lg-start">
                        <div class="col-12 col-lg-4 mx-auto text-center align-self-center mb-3 mb-lg-0">
                            <img src="/siteimg/logos/hypontech.png" class="img img-fluid" alt="hypontech">
                        </div>
                        <div class="col-12 col-lg-5">
                            <p>
                                <strong>Creăm o soluție solară inteligentă, aducând progrese reale într-o lume regenerabilă - energizăm viitorul pentru toți, oriunde s-ar afla.</strong>
                                <br><br>
                                HYPONTECH mobilizează lumea cu un portofoliu interesant de invertoare fotovoltaice de stocare a energiei, precum și cu soluții inteligente de gestionare a acesteia. Produsele noastre au fost livrate și testate în medii de pe tot globul, în peste 50 de țări de pe 6 continente. Fomco Solar Systems este
                                distribuitorul principal al soluțiilor Hypontech în România.
                            </p>
                        </div>
                    </div>
                    <div class="row mb-0 mb-md-3 text-center text-md-start">
                        <div class="col-12 col-md me-3 boxed mb-3 mb-md-0 d-flex flex-column min-box">
                            <div class="img-wrapper">
                                <img src="/siteimg/logos/webasto.png" class="img img-fluid" alt="webasto">
                            </div>

                            <p>
                                Datorită combinației noastre unice de
                                <strong>expertiză auto și know-how în domeniul energiei, </strong>
                                creăm o bază de încredere pentru oferte de încărcare compatibile și noi dezvoltări de sisteme modulare.
                                Cu o istorie dovedită pe piața auto, abordarea noastră de calitate și gândirea inovatoare, Webasto este partenerul dvs. de încredere pentru mobilitatea electrică.
                            </p>
                        </div>
                        <div class="col-12 col-md boxed mb-3 mb-md-0 d-flex flex-column min-box">
                            <div class="img-wrapper">
                                <img src="/siteimg/logos/huawei.png" class="img img-fluid" alt="huawei">
                            </div>

                            <p>
                                <strong>Huawei este un furnizor global de infrastructură și dispozitive inteligente pentru tehnologia informației și comunicațiilor (ITC).</strong>
                                <br><br>
                                Cu soluții integrate în patru domenii cheie - rețele de telecomunicații, IT, dispozitive inteligente și servicii cloud ne angajăm să aducem digitalul fiecărei persoane, casă și organizație pentru o lume complet conectată, inteligentă.
                                Portofoliul de produse end-to-end de la Huawei, soluții și servicii sunt atât competitive, cât și sigure.
                            </p>
                        </div>
                    </div>
                    <div class="row mb-0 mb-md-3 text-center text-md-start">
                        <div class="col-12 col-md me-3 boxed mb-3 mb-md-0 d-flex flex-column min-box">
                            <div class="img-wrapper">
                                <img src="/siteimg/logos/hqmount.png" class="img img-fluid" alt="hqmount">
                            </div>

                            <p>
                                HQ Mount este specializată în cercetarea și dezvoltarea, producerea, vânzarea de soluții de sisteme de montaj.
                                <br><br>
                                Calitatea este piatra de temelie a supraviețuirii și dezvoltării companiei.
                            </p>
                        </div>
                        <div class="col-12 col-md boxed mb-3 mb-md-0 d-flex flex-column min-box">
                            <div class="img-wrapper">
                                <img src="/siteimg/logos/ja-solar.png" class="img img-fluid" alt="ja Solar">
                            </div>

                            <p>
                                Fondata în 2005, JA Solar este un producător de produse fotovoltaice de înaltă performanță. Cu 12 baze de produție și peste 20 de filiale în întreaga lume, cu avantajele sale de inovare tehnologică continuă, performanță finan­ciară solidă și rețele globale de vânzări și servicii bine stabilite, JA Solar a fost bine primită și foarte apreciată de clienții săi locali, dar și din străinătate.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>
