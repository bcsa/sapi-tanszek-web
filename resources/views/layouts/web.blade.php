<!DOCTYPE html>
<html>
<head>

    <title>Fomco</title>
    <META NAME="robots" CONTENT="noindex,nofollow">


    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="https://fonts.cdnfonts.com/css/raleway-5" rel="stylesheet">

    <link href="css/web.css" rel="stylesheet">
</head>

<body>
<main>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">
            <div class="hero-slider p-0">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner py-3">
                        <div class="carousel-item hero hero-1 active">
                            <div class="container h-inherit">
                                <div class="row h-inherit">
                                    <div class="col-7 offset-1 my-auto">
                                        <h1>Descoperă energia care te face independent!</h1>
                                        <button class="btn btn-yellow mt-5">
                                            Comandă online
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item hero hero-2">
                            <div class="container h-inherit">
                                <div class="row h-inherit">
                                    <div class="col-7 offset-1 my-auto">
                                        <h1>Fii pe plus cu energia prin programul Casa Verde</h1>
                                        <button class="btn btn-yellow mt-5">
                                            Vezi opțiuni de finanțare
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item hero hero-3">
                            <div class="container h-inherit">
                                <div class="row h-inherit">
                                    <div class="col-7 offset-1 my-auto">
                                        <h1>Panouri fotovoltaice gândite pentru casa ta!</h1>
                                        <button class="btn btn-yellow mt-5">
                                            Configurează-ți casa
                                        </button>
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

    <div class="bg-light-gray">
        <div class="container">
            <div class="row stats-wrapper p-relative">
                <div class="col-12 col-md-6 col-lg-6 mt-md-3 mt-xl-0 col-xl-3 my-auto text-center">
                    <div class="stat">
                        <img src="/siteimg/check-w-bg.svg" class="img img-fluid" alt="experienta">
                        <div class="my-auto">
                            <p class="stats-title">
                                12 ani+
                            </p>
                            <p>
                                experiență
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 mt-md-3 mt-xl-0 col-xl-3 my-auto text-center">
                    <div class="stat">
                        <img src="/siteimg/icons/fotovoltaice.svg" class="img img-fluid" alt="fotovoltaice">
                        <div class="my-auto">
                            <p class="stats-title">
                                55.000+
                            </p>
                            <p>
                                panouri montate
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-3 mt-md-3 mt-xl-0 my-auto text-center">
                    <div class="stat">
                        <img src="/siteimg/icons/facturi.svg" class="img img-fluid" alt="facturi reduse">
                        <div class="my-auto">
                            <p class="stats-title">
                                850+ consumatori
                            </p>
                            <p>
                                cu facturi reduse la energie
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-3 mt-md-3 mt-xl-0 my-auto text-center">
                    <div class="stat">
                        <img src="/siteimg/icons/co2.svg" class="img img-fluid" alt="CO2 economisiți">
                        <div class="my-auto">
                            <p class="stats-title">
                                3.355.800 kg
                            </p>
                            <p>
                                de CO2 economisiți
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-none prosumer-section">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <h2>
                                        Cum poți deveni <br>
                                        <span>prosumer?</span>
                                    </h2>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>

                        <div class="col-12 col-md-7 offset-md-1">
                            <img src="siteimg/hero1.jpg" class="img img-fluid" alt="prosumer">
                        </div>
                    </div>
                </div>
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

    <div class="hero-2-wrapper">
        <div class="container h-inherit">
            <div class="row h-inherit my-auto py-5">
                <div class="col-12 col-md-6 my-auto">
                    <div class="row">
                        <div class="col-12 col-md-2 img-wrapper text-center text-md-end">
                            <img src="siteimg/icons/economii.svg" class="img img-fluid">
                        </div>
                        <div class="col-12 col-md-10 text-center text-md-start mt-3 mt-md-0">
                            <p class="hero-title">
                                Costuri reduse la factura de energie
                            </p>
                            <p>
                                Mai multe avantaje pentru tine. Producerea energiei proprii duce la reducerea
                                consumului
                                din rețea și, implicit, și la reducerea costurilor.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-auto pt-4 pt-md-0">
                    <div class="row">
                        <div class="col-12 col-md-2 img-wrapper text-center text-md-end">
                            <img src="siteimg/icons/viitor.svg" class="img img-fluid">
                        </div>
                        <div class="col-12 col-md-10 text-center text-md-start mt-3 mt-md-0">
                            <p class="hero-title">
                                Soluția viitorului
                            </p>
                            <p>
                                Misiunea noastră este să oferim energie pentru generații. Atunci când alegi
                                FOMCO Solar,
                                nu alegi doar trendul de astăzi - alegi viitorul de mâine.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-auto pt-4 pt-md-0">
                    <div class="row">
                        <div class="col-12 col-md-2 img-wrapper text-center text-md-end">
                            <img src="siteimg/icons/handshake.svg" class="img img-fluid">
                        </div>
                        <div class="col-12 col-md-10 text-center text-md-start mt-3 mt-md-0">
                            <p class="hero-title">
                                Aproape de nevoile tale
                            </p>
                            <p>
                                Drumul tău spre independența energetică începe aici. Îți oferim consultanță
                                tehnică și
                                economică pe tot parcursul realizării proiectului tău de energie regenerabilă.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-auto pt-4 pt-md-0">
                    <div class="row">
                        <div class="col-12 col-md-2 img-wrapper text-center text-md-end">
                            <img src="siteimg/icons/garantia.svg" class="img img-fluid">
                        </div>
                        <div class="col-12 col-md-10 text-center text-md-start mt-3 mt-md-0">
                            <p class="hero-title">
                                Garanția unei alegeri sigure
                            </p>
                            <p>
                                Suntem prezenți pe piață de peste 12 ani, fapt ce ne ajută să oferim constant
                                servicii și
                                produse calitative. Deținem 5 parcuri fotovoltaice proprii, iar dorința de
                                evoluție este
                                cea care ne definește.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-10">
            <div class="col-12">
                <h2>
                    <span>Comandă online</span>
                </h2>

                <p>
                    Îți oferim produse calitative pentru <br>
                    implementarea proiectului tău de energie <br>
                    regenerabilă.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="shop-online-wrapper">
                    <div class="row">
                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner py-5">
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
                                                        <a href="#" class="btn btn-yellow">
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
                                                        <a href="#" class="btn btn-yellow">
                                                            vezi detalii
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-3 my-3 my-lg-0">
                                                <div class="product-wrapper">
                                                    <span class="promo">-10%</span>
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
                                                            569RON <strike>750 RON</strike>
                                                        </p>
                                                    </div>

                                                    <div class="order-button-wrapper text-center">
                                                        <a href="#" class="btn btn-yellow">
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
                                                        <a href="#" class="btn btn-yellow">
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
                                                        <a href="#" class="btn btn-yellow">
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
                                                        <a href="#" class="btn btn-yellow">
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
                                                        <a href="#" class="btn btn-yellow">
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
                                                        <a href="#" class="btn btn-yellow">
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

                    <div class="row mt-10">
                        <div class="col text-center">
                            <button class="btn btn-yellow">
                                Vezi toate produsele
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row despre-noi-hero">
            <div class="d-md-none col-12 col-md-6 p-0 image-holder-1">
            </div>

            <div class="col my-auto text-wrapper">
                <div class="rest-wrapper-left pe-md-5">
                    <h2>
                        Despre noi
                    </h2>
                    <p>
                        FOMCO Solar s-a axat, încă din anul 2011, pe proiectarea, execuția și exploatarea sistemelor
                        fotovoltaice, atât industriale (montate pe câmp deschis și acoperișuri), cât și rezidențiale.
                    </p>
                    <p>
                        Acum, cu o echipă de aproximativ 50 de colegi şi cu un stoc permanent de peste 7000 de panouri
                        fotovoltaice, suntem partenerul de încredere în consultanța, realizarea, implementarea și
                        managementul proiectelor de energie regenerabilă a mii de clienți.
                    </p>

                    <button class="btn btn-white mt-1">
                        Află mai multe
                    </button>
                </div>
            </div>
            <div class="d-none d-md-block col-12 col-md-6 p-0 image-holder-1">
            </div>

            <div class="col-12 col-md-6 p-0 image-holder-2">
            </div>
            <div class="col my-auto text-wrapper">
                <div class="rest-wrapper-right ps-md-5">
                    <h2>
                        Servicii
                    </h2>
                    <p>
                        Fiecare pas din implementarea proiectului tău de energie regenerabilă este tratat cu
                        profesionalism
                        și promptitudine de către echipa noastră de specialiști. De aceea, oferim servicii integrate
                        care
                        să ajute la finalizarea eficientă a obiectivului pe care ți l-ai propus.
                    </p>
                    <p>
                        De la consultanță, proiectare, obzținerea de avize, execuție și până la furnizarea de stații de
                        încărcare pentru business-ul tău, dorim să facem din fiecare interacțiune o colaborare de
                        succes.
                    </p>

                    <button class="btn btn-white mt-1">
                        Vezi servicii
                    </button>
                </div>
            </div>
        </div>

        <div class="row portfolio-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>
                            <span>Portfoliu</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div id="portfolio-slider" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner py-3">

                    <div class="carousel-item active">
                        <div class="container h-inherit">
                            <div class="row h-inherit">
                                <div class="slider-wrapper">
                                    <p class="slider-title">
                                        Proiect acoperiș Vim Spectrum
                                    </p>

                                    <ul>
                                        <li><strong>Locație:</strong> Corunca, jud. Mureș</li>
                                        <li><strong>Capacitate instalată:</strong> 60 kW</li>
                                    </ul>

                                    <button class="btn btn-yellow">
                                        vezi detalii
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="container h-inherit">
                            <div class="row h-inherit">
                                <div class="slider-wrapper">
                                    <p class="slider-title">
                                        Proiect acoperiș Vim Spectrum
                                    </p>

                                    <ul>
                                        <li><strong>Locație:</strong> Corunca, jud. Mureș</li>
                                        <li><strong>Capacitate instalată:</strong> 60 kW</li>
                                    </ul>

                                    <button class="btn btn-yellow">
                                        vezi detalii
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#portfolio-slider"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#portfolio-slider"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col testimoniale-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4 p-md-0">
                            <h2>
                                <span>Testimoniale</span>
                            </h2>

                            <p class="mt-4">
                                Atât noi, cât și clienții noștri suntem uniți de aceeași valoare: credem în puterea
                                energiei.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div id="testimoniale-carousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="carousel-control-prev me-sm-3 me-xl-0" type="button"
                                                data-bs-target="#testimoniale-carousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>

                                        <button class="carousel-control-next ms-sm-3 ms-xl-0" type="button"
                                                data-bs-target="#testimoniale-carousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <img class="d-block mb-3" src="/siteimg/icons/account.svg">
                                                <p>"Firmă de încredere, audit profesional cu echipamente moderne. Echipa de montaj a lucrat foarte punctual, ordonat. Recomand cu drag echipa Fomco Solar Systems"</p>
                                                <h3>Rodica Trozner</h3>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p>4,86 kW On Grid</p>
                                                    </div>
                                                    <div class="col-5 text-end">
                                                        5.0 ★★★★★
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 offset-lg-1">
                                                <img class="d-block mb-3" src="/siteimg/icons/account.svg">
                                                <p>"Părerea mea este că sunt profesionaliști și sunt foarte buni în domeniu."</p>
                                                <h3>Sandor Németh (Alexandru)</h3>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p>4,48 kW On Grid</p>
                                                    </div>
                                                    <div class="col-5 text-end">
                                                        5.0 ★★★★★
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 offset-lg-1">
                                                <img class="d-block mb-3" src="/siteimg/icons/account.svg">
                                                <p>"Sunt extrem de mulțumit de modul în care au făcut treaba băieții de la montaj. Merită tot respectul! Menționez ca deja am recomandat încă două lucrări."</p>
                                                <h3>Alexandru Musat</h3>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p>4,86 KW On Grid</p>
                                                    </div>
                                                    <div class="col-5 text-end">
                                                        5.0 ★★★★★
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <img class="d-block mb-3" src="/siteimg/icons/account.svg">
                                                <p>"Firmă de încredere, audit profesional cu echipamente moderne. Echipa de montaj a lucrat foarte punctual, ordonat. Recomand cu drag echipa Fomco Solar Systems"</p>
                                                <h3>Rodica Trozner</h3>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p>4,86 kW On Grid</p>
                                                    </div>
                                                    <div class="col-5 text-end">
                                                        5.0 ★★★★★
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 offset-lg-1">
                                                <img class="d-block mb-3" src="/siteimg/icons/account.svg">
                                                <p>"Părerea mea este că sunt profesionaliști și sunt foarte buni în domeniu."</p>
                                                <h3>Sandor Németh (Alexandru)</h3>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p>4,48 kW On Grid</p>
                                                    </div>
                                                    <div class="col-5 text-end">
                                                        5.0 ★★★★★
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 offset-lg-1">
                                                <img class="d-block mb-3" src="/siteimg/icons/account.svg">
                                                <p>"Sunt extrem de mulțumit de modul în care au făcut treaba băieții de la montaj. Merită tot respectul! Menționez ca deja am recomandat încă două lucrări."</p>
                                                <h3>Alexandru Musat</h3>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p>4,86 KW On Grid</p>
                                                    </div>
                                                    <div class="col-5 text-end">
                                                        5.0 ★★★★★
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <img class="d-block mb-3" src="/siteimg/icons/account.svg">
                                                <p>"Firmă de încredere, audit profesional cu echipamente moderne. Echipa de montaj a lucrat foarte punctual, ordonat. Recomand cu drag echipa Fomco Solar Systems"</p>
                                                <h3>Rodica Trozner</h3>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p>4,86 kW On Grid</p>
                                                    </div>
                                                    <div class="col-5 text-end">
                                                        5.0 ★★★★★
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 offset-lg-1">
                                                <img class="d-block mb-3" src="/siteimg/icons/account.svg">
                                                <p>"Părerea mea este că sunt profesionaliști și sunt foarte buni în domeniu."</p>
                                                <h3>Sandor Németh (Alexandru)</h3>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p>4,48 kW On Grid</p>
                                                    </div>
                                                    <div class="col-5 text-end">
                                                        5.0 ★★★★★
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 offset-lg-1">
                                                <img class="d-block mb-3" src="/siteimg/icons/account.svg">
                                                <p>"Sunt extrem de mulțumit de modul în care au făcut treaba băieții de la montaj. Merită tot respectul! Menționez ca deja am recomandat încă două lucrări."</p>
                                                <h3>Alexandru Musat</h3>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p>4,86 KW On Grid</p>
                                                    </div>
                                                    <div class="col-5 text-end">
                                                        5.0 ★★★★★
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#testimoniale-carousel" data-bs-slide-to="0"
                                        class="active"></button>
                                <button type="button" data-bs-target="#testimoniale-carousel"
                                        data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#testimoniale-carousel"
                                        data-bs-slide-to="2"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row partenerii-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>
                            <span>Partenerii</span> <br> noștri
                        </h2>
                    </div>
                </div>

                <div class="row mt-5 logos">
                    <div class="col-6 col-md-3 mb-4 mb-md-0 text-center">
                        <img src="/siteimg/logos/webasto.png" class="img img-fluid" alt="webasto">
                    </div>
                    <div class="col-6 col-md-3 mb-4 mb-md-0 text-center">
                        <img src="/siteimg/logos/hqmount.png" class="img img-fluid" alt="hqmount">
                    </div>
                    <div class="col-6 col-md-3 mb-4 mb-md-0 text-center">
                        <img src="/siteimg/logos/ja-solar.png" class="img img-fluid" alt="ja Solar">
                    </div>
                    <div class="col-6 col-md-3 mb-4 mb-md-0 text-center">
                        <img src="/siteimg/logos/hypontech.png" class="img img-fluid" alt="hypontech">
                    </div>
                    <div class="d-block d-sm-none col-12 text-center mb-4 mb-md-0">
                        <img src="/siteimg/logos/huawei.png" class="img img-fluid" alt="huawei">
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
