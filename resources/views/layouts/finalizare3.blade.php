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

<body class="checkout3-page">
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
        <div class="row my-5">
            <div class="col-12 col-lg-8">
                <div class="col-12 product-wrapper mb-5">
                    <div class="row">
                        <div class="col-4 col-md-3 mx-auto">
                            <img class="img img-fluid product-image" src="siteimg/invertor1.png">
                        </div>
                        <div class="col-8 col-md-6 mx-auto mb-4 align-self-end">
                            <h3>
                                Invertor trifazic de rețea
                            </h3>
                            <div class="mb-5 subtitle">
                                ABB TRIO-7.5kW-TL-OUTD-S-400 / 3M98990S005A
                            </div>
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-4 text-end text-sm-start mb-3 mb-sm-0">
                                    <a href="" class="btn-delete">
                                        <img class="img img-fluid" src="siteimg/icons/delete.png">
                                        <b>Șterge</b>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-8 text-sm-end">
                                    <span class="product-price">
                                        800 RON
                                    </span>
                                    <select class="form-select w-auto d-inline ms-sm-3 float-end float-sm-none" aria-label="amount">
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 product-wrapper mb-5">
                    <div class="row">
                        <div class="col-4 col-md-3 mx-auto">
                            <img class="img img-fluid product-image" src="siteimg/invertor2.png">
                        </div>
                        <div class="col-8 col-md-6 mx-auto mb-4 align-self-end">
                            <h3>
                                Invertor monofazic de rețea
                            </h3>
                            <div class="mb-5 subtitle">
                                ABB TRIO-7.5kW-TL-OUTD-S-400 / 3M98990S005A
                            </div>
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-4 text-end text-sm-start mb-3 mb-sm-0">
                                    <a href="" class="btn-delete">
                                        <img class="img img-fluid" src="siteimg/icons/delete.png">
                                        <b>Șterge</b>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-8 text-sm-end">
                                    <span class="product-price">
                                        750 RON
                                    </span>
                                    <select class="form-select w-auto d-inline ms-sm-3 float-end float-sm-none" aria-label="amount">
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 col-xl-3 align-self-start">
                <div class="total-wrapper">
                    <h2>
                        Suma totală
                    </h2>

                    <div class="row my-3 livrare">
                        <div class="col-12">
                            Livrare gratuită <span class="float-end">0,00 RON</span>
                        </div>
                    </div>

                    <div class="row my-3 total-amount">
                        <div class="col-12">
                            Suma totală <span class="float-end">100550,00 RON</span>
                        </div>
                    </div>

                    <div class="btn-order text-center mt-5">
                        <a href="" class="btn btn-yellow px-3">
                            Continuă cu plata comenzii
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5 text-center text-md-start">
            <h2 class="col-12 col-md-5 mb-3">
                Livrare preconizată
            </h2>
            <div class="w-100"></div>
            <span class="col-auto mx-auto mx-md-0 ms-md-2 shipping-time">
                <b>2 August - 4 August</b>
            </span>
        </div>

        <div class="row my-5 text-center text-md-start">
            <h2 class="col-12 col-md-5 mb-3">
                Date comandă
            </h2>
            <form action="">
                <div class="row my-5">
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
                </div>
            </form>
        </div>

        <div class="col-12 col-lg-10 my-5 text-center text-md-start shipping">
            <div class="row">
                <div class="col-12 col-md me-5 mb-5 mb-md-0">
                    <h2 class="mb-3">
                        Modalități de plată
                    </h2>
                    <div class="box">
                        <select class="form-select">
                            <option disabled selected>Alegeți modalitatea de plată</option>
                            <option value="cash">Numerar</option>
                            <option value="card">Card bancar</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 col-md">
                    <h2 class="mb-3">
                        Livrarea
                    </h2>
                    <div class="box">
                        <select class="form-select">
                            <option value="preluare" selected>Preluare personală</option>
                            <option value="curier">Livrare prin curier</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 px-5 px-md-0 mt-4 ms-0 ms-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="accept">
                        <label class="form-check-label" for="accept">
                            Accept termenii și condițiile generale și declarația de confidențialitate.
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-12 col-lg me-0 me-lg-5 mb-5 mb-lg-0">
                <div class="box">
                    <h2 class="col-12 mb-3">
                        <span>Întrebări frecvente</span>
                    </h2>
                    <div class="accordion" id="faq">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-headingOne" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingTwo" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingThree" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg">
                <div class="box">
                    <h2 class="col-12 mb-3">
                        <span>Contact</span>
                    </h2>

                    <div class="ms-lg-3 py-5 d-inline-flex">
                        <img class="img img-fluid me-1" width="50px" src="siteimg/icons/contact-phone.svg">
                        <strong class="my-auto">Contactează-ne telefonic: <a href="tel:+40724364432" class="d-inline text-nowrap">+40 724 364 432</a></strong>
                    </div>

                    <div class="ms-lg-3 py-5 d-inline-flex">
                        <img class="img img-fluid me-1" width="50px" src="siteimg/icons/contact-email.svg">
                        <strong class="my-auto">Scrie-ne: info@fomcosolar.ro</strong>
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
