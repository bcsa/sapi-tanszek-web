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

<body class="shop-page">
<main>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row bg-yellow">
            <div class="col-12 col-sm p-0 my-auto">
                <div class="rest-wrapper-left rest-wrapper-left-5 text-center text-md-start ">
                    <h1 class="hero-title">
                        Shop
                    </h1>
                </div>
            </div>
            <div class="col-12 col-sm-7 p-0 shop-page-hero">
            </div>
        </div>
    </div>

    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filtrează</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-sm left-sidebar p-sm-0" id="filter">
                        <div class="row">
                            <div class="col-12">
                                <div class="box">
                                    <h3>Categorii de produse</h3>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                Vezi toate
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Panouri fotovoltaice
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Invertoare
                                            </a>

                                            <div class="subcat">
                                                <ul>
                                                    <li>
                                                        <a href="">
                                                            Huawei
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            Qpeak
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            Panouri fotovoltaice
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            Regulator de încărcare
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="">
                                                Regulator de încărcare
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Baterii
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Accesorii
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Pachete
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Încărcătoare e-mașini
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Iluminare LED
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 mt-3 mt-sm-0">
                                <div class="box">
                                    <h3>Tip sistem</h3>
                                    <select class="form-select" aria-label="tip sistem">
                                        <option selected>Toate</option>
                                        <option value="mono">Monofazice</option>
                                        <option value="tri">Trifazice</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mt-3 mt-sm-0">
                                <div class="box">
                                    <h3>Consum lorem kW</h3>
                                    <select class="form-select" aria-label="consum kW">
                                        <option selected>Alege un consum</option>
                                        <option value="50-100">50 - 100 kWh</option>
                                        <option value="100-500">100 - 500 kWh</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mt-3 mt-sm-0">
                                <div class="box brands">
                                    <h3>Brand</h3>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="lorem">
                                        <label class="form-check-label" for="accept">
                                            Lorem
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="ipsum">
                                        <label class="form-check-label" for="accept">
                                            Ipsum
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="dolor">
                                        <label class="form-check-label" for="accept">
                                            Dolor
                                        </label>
                                    </div>
                                    <div class="text-end small">
                                        <a href="#">
                                            Încarcă mai multe
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3 mt-sm-0">
                                <div class="box text-center">
                                    <a class="btn btn-yellow" data-bs-dismiss="modal">
                                        Aplică filtre la căutare
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">
            <div class="col-12 col-sm left-sidebar d-none d-lg-block p-sm-0">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <h3>Categorii de produse</h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        Vezi toate
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Panouri fotovoltaice
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Invertoare
                                    </a>

                                    <div class="subcat">
                                        <ul>
                                            <li>
                                                <a href="">
                                                    Huawei
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    Qpeak
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    Panouri fotovoltaice
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    Regulator de încărcare
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="">
                                        Regulator de încărcare
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Baterii
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Accesorii
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Pachete
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Încărcătoare e-mașini
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Iluminare LED
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 mt-3 mt-sm-0">
                        <div class="box">
                            <h3>Tip sistem</h3>
                            <select class="form-select" aria-label="tip sistem">
                                <option selected>Toate</option>
                                <option value="mono">Monofazice</option>
                                <option value="tri">Trifazice</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mt-3 mt-sm-0">
                        <div class="box">
                            <h3>Consum lorem kW</h3>
                            <select class="form-select" aria-label="consum kW">
                                <option selected>Alege un consum</option>
                                <option value="50-100">50 - 100 kWh</option>
                                <option value="100-500">100 - 500 kWh</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mt-3 mt-sm-0">
                        <div class="box brands">
                            <h3>Brand</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="lorem">
                                <label class="form-check-label" for="accept">
                                    Lorem
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="ipsum">
                                <label class="form-check-label" for="accept">
                                    Ipsum
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="dolor">
                                <label class="form-check-label" for="accept">
                                    Dolor
                                </label>
                            </div>
                            <div class="text-end small">
                                <a href="#">
                                    Încarcă mai multe
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3 mt-sm-0">
                        <div class="box align-self-end">
                            <h3>
                                *SPATIU OPȚIONAL PROMOȚIE MAGAZIN ONLINE
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-sticky d-flex d-lg-none">
                <a href="#filterModal" data-bs-toggle="modal">
                    <img class="img img-fluid" src="siteimg/icons/filter.svg">
                </a>
            </div>
            <div class="col-12 col-lg-9 p-md-0">
                <div class="row justify-content-between">
                    @for ($i = 0; $i < 12; $i++)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-3 my-md-0 mb-md-3">
                            <div class="product-wrapper">
                                <div class="img-wrapper justify-content-center d-flex flex-wrap align-items-center">
                                    <img src="/siteimg/item1.jpg" class="img img-fluid"
                                         alt="panou solar">
                                </div>

                                <div class="info-container">
                                    <p class="product-title">
                                        Panou fotovoltaic
                                    </p>
                                    <p>
                                        Seria ZXM6-LD60-310W din sticlă dublă și ușoară Znshinesolar
                                        5BB, modul PV mono
                                    </p>

                                    <p class="price">
                                        750 RON
                                    </p>
                                </div>

                                <div class="order-button-wrapper text-center">
                                    <a href="#" class="btn btn-yellow">
                                        adaugă în coș
                                    </a>
                                </div>

                                <div class="view-details-button-wrapper text-center">
                                    <a href="#" class="btn btn-yellow details mt-3">
                                        vezi detalii
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="row my-5">
                    <div class="col-12 text-center">
                        <a href="#" class="load-more">
                            Încarcă mai multe
                        </a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
