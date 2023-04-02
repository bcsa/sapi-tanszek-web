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

<body class="portfoliu-details-page">
<main>

    @include('layouts.header')

    <div class="bg-yellow">
        <div class="container">
            <div class="row hero-wrapper">
                <div class="col-12 col-md-5 my-auto text-center text-sm-start">
                    <h1 class="hero-title">
                        Portfoliu
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row my-0 my-lg-5">
                        <div class="col-12">
                            <a href="" class="go-back mt-5 mt-lg-0">
                                <span class="carousel-control-prev-icon"></span>
                                Mergi înapoi la Portofoliu
                            </a>

                            <div id="img-slider" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-inner text-center py-3 mb-5">
                                    <div class="carousel-item active">
                                        <img class="img img-fluid" src="siteimg/portfoliu/DJI_0010.JPG">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img img-fluid" src="siteimg/portfoliu/DJI_0062.JPG">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img img-fluid" src="siteimg/portfoliu/DJI_0010.JPG">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img img-fluid" src="siteimg/portfoliu/DJI_0062.JPG">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img img-fluid" src="siteimg/portfoliu/DJI_0010.JPG">
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-md my-3 my-md-0">
                                            <img class="img img-fluid"
                                                 src="siteimg/portfoliu/DJI_0010.JPG"
                                                 data-bs-target="#img-slider"
                                                 data-bs-slide-to="0"
                                                 class="active"
                                            >
                                        </div>

                                        <div class="col-12 col-md my-3 my-md-0">
                                            <img class="img img-fluid"
                                                 src="siteimg/portfoliu/DJI_0062.JPG"
                                                 data-bs-target="#img-slider"
                                                 data-bs-slide-to="1"
                                            >
                                        </div>

                                        <div class="col-12 col-md my-3 my-md-0">
                                            <img class="img img-fluid"
                                                 src="siteimg/portfoliu/DJI_0010.JPG"
                                                 data-bs-target="#img-slider"
                                                 data-bs-slide-to="2"
                                            >
                                        </div>

                                        <div class="col-12 col-md my-3 my-md-0">
                                            <img class="img img-fluid"
                                                 src="siteimg/portfoliu/DJI_0062.JPG"
                                                 data-bs-target="#img-slider"
                                                 data-bs-slide-to="3"
                                            >
                                        </div>

                                        <div class="col-12 col-md my-3 my-md-0">
                                            <img class="img img-fluid"
                                                 src="siteimg/portfoliu/DJI_0010.JPG"
                                                 data-bs-target="#img-slider"
                                                 data-bs-slide-to="4"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#img-slider"
                                        data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#img-slider"
                                        data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="proiect-wrapper mt-5 mt-lg-3">
                                <div class="p-2">
                                    <h2>Proiect acoperiș rezidențial</h2>
                                    <div class="location">
                                        <b>Locație:</b> Cristești, jud Mureș
                                    </div>
                                    <div class="my-4">
                                        <ul>
                                            <li><b>Capacitate instalată:</b> 7 kW</li>
                                            <li><b>ON grid</b></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-yellow">
        <div class="container-fluid">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-12 col-md-4 p-md-0">
                        <h2>Produse de referință</h2>
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
                                                            <a href="#" class="btn btn-yellow details details">
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

                        <div class="row mt-10">
                            <div class="col text-center">
                                <button class="btn btn-yellow details btn-white">
                                    Vezi toate produsele
                                </button>
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
