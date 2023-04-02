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

<body class="servicii-page">
<main>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row bg-yellow">
            <div class="col p-0 my-auto">
                <div class="rest-wrapper-left rest-wrapper-left-5 text-center text-md-start ">
                    <h1 class="hero-title">Rezidențial</h1>
                </div>
            </div>
            <div class="col-12 col-md-7 p-0 hero-img">
            </div>
        </div>

        <div class="row bg-light-gray">
            <div class="col">
                <div class="container">
                    <div class="row stats-wrapper p-relative">
                        <div class="col-12 col-lg-4 col-xl my-auto text-center">
                            <div class="stat">
                                <img src="siteimg/icons/consultanta.svg" class="img img-fluid" alt="Consultanță">
                                <span class="my-auto">
                                    Beneficii
                                </span>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-yellow">
            <div class="col">
                <div class="container mt-10 mb-5">
                    <div class="col-8 ps-md-4 mx-auto font-2 fs-5">
                        <h2 class="mb-5 text-center fs-1">
                            Obține un sistem fotovoltaic în 7 pași
                        </h2>

                        <div class="row boxed mb-5">
                            <div class="col-2 fw-bold my-auto">
                                Pasul 1
                            </div>
                            <div class="col">
                                După ce ne-ai contactat, un
                                agent de vânzări va efectua
                                în primă instanță un audit
                                telefonic, în cadrul căruia îți
                                va adresa câteva întrebări
                                esențiale.
                            </div>
                        </div>

                        <div class="row boxed mb-5">
                            <div class="col-2 fw-bold my-auto">
                                Pasul 2
                            </div>
                            <div class="col-10">
                                Ulterior, vânzătorul îți va trimite
                                o ofertă informativă adaptat la nevoile tale (cu una,
                                două sau chiar trei opțiuni).
                            </div>
                        </div>

                        <div class="row boxed mb-5">
                            <div class="col-2 fw-bold my-auto">
                                Pasul 3
                            </div>
                            <div class="col-10">
                                Dacă oferta îți va satisface
                                așteptările, se va efectua un
                                al doilea audit în persoană,
                                la locuinţa sau firma ta.
                            </div>
                        </div>

                        <div class="row boxed mb-5">
                            <div class="col-2 fw-bold my-auto">
                                Pasul 4
                            </div>
                            <div class="col-10">
                                În posesia tuturor
                                informațiilor oferite, vei
                                decide dacă oferta se
                                potrivește nevoilor tale și,
                                în caz afirmativ, vei semna
                                contractul și vei achita
                                avansul. În caz contrar,
                                oferta se va reface ținând
                                cont de observațiile pe care
                                ni le vei prezenta.
                            </div>
                        </div>

                        <div class="row boxed mb-5">
                            <div class="col-2 fw-bold my-auto fw-bold my-auto">
                                Pasul 5
                            </div>
                            <div class="col-10">
                                Vei fi contactat de
                                coordonatorul de montaj
                                pentru a programa instalarea.
                            </div>
                        </div>

                        <div class="row boxed mb-5">
                            <div class="col-2 fw-bold my-auto">
                                Pasul 6
                            </div>
                            <div class="col-10">
                                Se efectuează instalarea panourilor fotovoltaice şi peste câteva zile,
                                racordarea la rețea. Totodată îţi instalăm aplicaţia de monitorizare a
                                sistemului fotovoltaic şi vei primi un scurt instructaj şi manual de utilizare.
                            </div>
                        </div>

                        <div class="row boxed mb-5">
                            <div class="col-2 fw-bold my-auto">
                                Pasul 7
                            </div>
                            <div class="col-10">
                                După achitarea completă a sistemului îți punem la dispoziție
                                documentația completă
                                pentru a obține certificatul de
                                racordare, iar ulterior contractul
                                de prosumator cu furnizorul de
                                energie electrică.
                            </div>
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
