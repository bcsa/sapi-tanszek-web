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

<body class="product-page">
<main>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row bg-yellow">
            <div class="col p-0 my-auto">
                <div class="rest-wrapper-left rest-wrapper-left-5 text-center text-md-start ">
                    <h1 class="hero-title">Shop</h1>
                </div>
            </div>
            <div class="col-12 col-md-7 p-0 product-page-hero">
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col back">
                <a href="#">
                    <span class="carousel-control-prev-icon"></span>
                    Mergi înapoi la Shop
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 text-center">
                <img src="/siteimg/item1.jpg" class="img img-fluid">
            </div>
            <div class="col-12 col-lg-6">
                <div class="product-box">
                    <h2 class="pb-3">
                        <span>Panou fotovoltaic</span>
                    </h2>

                    <p class="subtitle">
                        Seria ZXM6-LD60-310W din sticlă dublă și ușoară Znshinesolar 5BB, modul PV mono
                    </p>

                    <p>
                        Fabricat cu materiale și componente selectate special pentru a oferi calitate, durată și eficiență,
                        modulele din sticla dublă ZXM6-LD60 de la caracteristica ZNSHINE SOLAR au atât funcții decorative,
                        cât și de umbrire. Ele reprezintă alegerea perfectă pentru aplicațiile de construcție BIPV și BAPV.
                        Acest lucru vă permite să produceți energie curată, reducând în același timp factura la energie.
                        Modulele solare din sticlă dublă ZNSHINE SOLAR’s ZXM6-LD60 sunt testate și aprobate de laboratoare
                        internaționale recunoscute, oferind clienților noștri o calitate fiabilă și optimizată la preț avantajos.
                    </p>

                    <p class="warranty">
                        <strong>12 ani garanție produs / 30 ani garanție randament</strong>
                    </p>

                    <div class="row py-3">
                        <div class="col-12 col-md-6">
                            <span class="stock">
                                În stoc
                            </span>
                        </div>
                        <div class="col-12 col-md-6 text-end">
                            <span class="price">
                                750 RON
                            </span>
                        </div>
                    </div>

                    <div class="text-center text-sm-start">
                        <label for="quantiy" class="pt-5">
                            CANTITATE
                        </label>
                        <div class="input-group quantity justify-content-center justify-content-sm-start">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number minus">
                                    -
                                </button>
                            </span>

                            <input type="text" name="quantity" id="quantity" class="form-control input-number" value="1" min="1">

                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number plus">
                                    +
                                </button>
                            </span>
                        </div>

                        <button class="btn btn-yellow mt-4">
                            adaugă în coș
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-12">
                <div class="info-box">
                    <div class="row pb-4 text-center text-sm-start">
                        <div class="col-12 col-sm-4 col-xl-3 active">
                            <span class="spec">Descriere</span>
                        </div>
                        <div class="col-12 col-sm-4 col-xl-3">
                            <span class="spec">Specificații</span>
                        </div>
                        <div class="col-12 col-sm-4 col-xl-3">
                            <span class="spec">Fișă tehnică</span>
                        </div>
                    </div>
                    <p>
                        <strong>Modul PV inovator</strong>
                    </p>
                    <p>
                        În comparație cu modulele obișnuite din sticlă dublă, modulele noastre sunt extrem de robuste
                    </p>
                    <p>
                        <strong>Eficiență ridicată </strong>
                    </p>
                    <p>
                        Acoperirea cu grafen poate crește aproximativ 2W eficiența modulului prin creșterea în jur de
                        0,5% a transmisiei luminii
                    </p>
                    <p>
                        <strong>
                            Anti PID
                        </strong>
                    </p>
                    <p>
                        Degradare limitată a puterii modulului ZXM6-LD60 cauzată de efectul PID este garantată prin
                        testarea în condiții stricte pentru producția în serie
                    </p>
                    <p>
                        <strong>
                            Răspuns mai bun la iluminare slabă
                        </strong>
                    </p>
                    <p>
                        Coeficientul de temperatură mai redus și răspunsul spectral larg, rezultă în putere de ieșire
                        mai mare, chiar și în condiții de lumină slabă
                    </p>
                    <p>
                        <strong>Ușor de instalat</strong>
                    </p>
                    <p>
                        Modulul este foarte ușor, astfel încât instalarea este mai ușoară, iar costurile de transport
                        sunt mai mici
                    </p>
                    <p>
                        <strong>
                            Acoperire cu grafen
                        </strong>
                    </p>
                    <p>
                        Modulele acoperite cu grafen pot crește producția de energie și autocurățarea, astfel
                        economisind costurile de întreținere
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light-gray pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="col-12 col-md-3">
                            <h2>
                                Produse <span>similare</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="shop-online-wrapper">
                        <div class="row">
                            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner py-3">
                                    <div class="carousel-item active">
                                        <div class="container">
                                            <div class="row justify-content-between">
                                                <div class="col-12 col-md-6 col-lg-3 my-3 my-lg-0">
                                                    <div class="product-wrapper">
                                                        <div class="img-wrapper text-center">
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
                                                            <a href="#" class="btn btn-yellow details">
                                                                vezi detalii
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-3 my-3 my-lg-0">
                                                    <div class="product-wrapper">
                                                        <div class="img-wrapper text-center">
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
                                                            <a href="#" class="btn btn-yellow details">
                                                                vezi detalii
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-3 my-3 my-lg-0">
                                                    <div class="product-wrapper">
                                                        <div class="img-wrapper text-center">
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
                                                            <a href="#" class="btn btn-yellow details">
                                                                vezi detalii
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-3 my-3 my-lg-0">
                                                    <div class="product-wrapper">
                                                        <div class="img-wrapper text-center">
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
                                                            <a href="#" class="btn btn-yellow details">
                                                                vezi detalii
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="container">
                                            <div class="row justify-content-between">
                                                <div class="col-12 col-md-6 col-lg-3 my-3 my-lg-0">
                                                    <div class="product-wrapper">
                                                        <div class="img-wrapper text-center">
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
                                                            <a href="#" class="btn btn-yellow details">
                                                                vezi detalii
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-3 my-3 my-lg-0">
                                                    <div class="product-wrapper">
                                                        <div class="img-wrapper text-center">
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
                                                            <a href="#" class="btn btn-yellow details">
                                                                vezi detalii
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-3 my-3 my-lg-0">
                                                    <div class="product-wrapper">
                                                        <div class="img-wrapper text-center">
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
                                                            <a href="#" class="btn btn-yellow details">
                                                                vezi detalii
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-3 my-3 my-lg-0">
                                                    <div class="product-wrapper">
                                                        <div class="img-wrapper text-center">
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
                                                            <a href="#" class="btn btn-yellow details">
                                                                vezi detalii
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                        data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                        data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
