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

<body class="finantare-page">
<main>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row bg-yellow">
            <div class="col-12 col-sm p-0 my-auto">
                <div class="rest-wrapper-left rest-wrapper-left-5 text-center text-md-start">
                    <h1 class="hero-title">
                        Programe <br> de finanțare
                    </h1>
                </div>
            </div>
            <div class="col-12 col-sm-7 p-0 finantare-page-hero">
            </div>
        </div>
    </div>

    <div class="bg-gray">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-6">
                    <div class="boxed-div d-flex flex-row">
                        <div class="image">
                            <img src="/siteimg/check-w-bg.svg" width="45px" class="img img-fluid me-2" alt="experienta">
                        </div>
                        <div class="my-auto">
                            <p>
                                Casa verde
                            </p>
                        </div>
                    </div>
                    <div class="boxed-years row mt-3 mx-auto">
                        <div class="col-12 col-lg-4 text-center">
                            <a href="#2019" class="btn btn-white px-5 py-1">
                                <strong>2019</strong>
                            </a>
                        </div>
                        <div class="col-12 col-lg-4 mt-3 mt-lg-0 text-center">
                            <a href="#2021" class="btn btn-white px-5 py-1">
                                <strong>2021</strong>
                            </a>
                        </div>
                        <div class="col-12 col-lg-4 mt-3 mt-lg-0 text-center">
                            <a href="#2022" class="btn btn-white px-5 py-1">
                                <strong>2022</strong>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <div class="boxed-div d-flex flex-row">
                        <div class="image">
                            <img src="/siteimg/check-w-bg.svg" width="45px" class="img img-fluid me-2" alt="experienta">
                        </div>
                        <div class="my-auto">
                            <p>
                                Electric Up
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row despre-noi-hero casa-verde-program">
            <div class="d-md-none col-12 col-md-6 p-0 image-holder-1">
            </div>
            <div class="col my-auto text-wrapper">
                <div class="rest-wrapper-left pe-sm-5 text-center text-sm-start my-3 my-sm-0">
                    <h2>
                        Casa verde
                    </h2>
                    <p>
                        Programul de finanțare Casa Verde, destinat persoanelor fizice, îți oferă posibilitatea să accesezi
                        fonduri nerambursabile și să instalezi sisteme de panouri fotovoltaice pentru producerea de energie
                        electrică, în vederea acoperirii necesarului de consum şi livrării surplusului în reţeaua naţională.
                    </p>

                    <button class="btn btn-black mt-1">
                        Contactează-ne
                    </button>
                </div>
            </div>
            <div class="d-none d-md-block col-12 col-md-6 p-0 image-holder-1">
            </div>
        </div>
    </div>

    <div id="2022" class="container-fluid">
        <div class="row despre-noi-hero casa-verde-program">
            <div class="col-12 col-md-6 p-0 image-holder-2">
            </div>
            <div class="col p-md-0 my-auto">
                <div class="rest-wrapper-left text-center">
                    <h2 class="mt-4 mt-sm-0">
                        Program 2022
                    </h2>
                    <p>
                        <strong>
                            Ghid de finantare 2022 – încă în curs de elaborare
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="2021" class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2>
                    <span>
                        Ghid de <br> finanțare(2021)
                    </span>
                </h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 col-lg-4 d-flex">
                <div class="row">
                    <div class="col-12">
                        <div class="boxed-info">
                            <p class="mb-1">
                                <strong>
                                    Cuantumul finanţării:
                                </strong>
                            </p>
                            <p>
                                Finanţarea se acordă în procent de până la 90% din valoarea totală a cheltuielilor eligibile,
                                în limita sumei de 20.000 lei
                            </p>

                            <p class="mt-4 mb-1">
                                <strong>
                                    Cheltuieli eligibile:
                                </strong>
                            </p>
                            <ul>
                                <li>
                                    cheltuielile cu achiziţia sistemului de panouri fotovoltaice cu putere minimă instalată de 3kW;
                                </li>
                                <li>
                                    cheltuielile cu montajul şi punerea în funcţiune a sistemului de panouri fotovoltaice;
                                </li>
                                <li>
                                    TVA aferent cheltuielilor eligibile.
                                </li>
                            </ul>

                            <p class="mt-4 mb-1">
                                <strong>
                                    Condiții cumulative minime:
                                </strong>
                            </p>
                            <ul>
                                <li>
                                    persoană fizică cu domiciliul în România;
                                </li>
                                <li>
                                    proprietar al imobilului-construcţie pe care se amplasează sistemul de panouri fotovoltaice;
                                </li>
                                <li>
                                    acordul tuturor proprietarilor cu privire la implementarea proiectului;
                                </li>
                                <li>
                                    imobilul pe care se implementează proiectul nu este afectat de sarcini, cu excepţia cazului
                                    în care este afectat de o ipotecă imobiliară;
                                </li>
                                <li>
                                    solicitantul şi coproprietarii / devălmaşii pot beneficia o singură dată de finanţare pentru
                                    un imobil identificat cu număr cadastral.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 d-flex mt-5 mt-lg-0">
                <div class="row">
                    <div class="col-12">
                        <div class="boxed-info">
                            <p class="mb-1">
                                <strong>
                                    Documente necesare:
                                </strong>
                            </p>

                            <ul>
                                <li>
                                    cererea de finanţare;
                                </li>
                                <li>
                                    actul de identitate al solicitantului și al coproprietarului / devălmaşului;
                                </li>
                                <li>
                                    împuternicirea notarială, în situaţia în care cererea de finanţare este semnată de către
                                    altcineva decât solicitantul;
                                </li>
                                <li>
                                    actul de identitate al persoanei împuternicite;
                                </li>
                                <li>
                                    extras de carte funciară (nu mai vechi de 60 de zile), din care să rezulte dreptul de
                                    proprietate al solicitantului asupra imobilului-construcţie sau faptul că este proprietar/deţine
                                    un drept de folosinţă asupra imobilului teren dacă sunt montate pe teren, în original;
                                </li>
                                <li>
                                    copia cărţii funciare colective, din care să rezulte maximum două unităţi individuale
                                    trecute pe aceeaşi carte funciară care adunate să fie egale cu 1 (un) întreg;
                                </li>
                                <li>
                                    certificatul de atestare fiscală privind obligaţiile de plată către bugetul de stat,
                                    emis pe numele solicitantului de către organul teritorial de specialitate al
                                    Ministerului Finanţelor, în termen de valabilitate;
                                </li>
                                <li>
                                    certificatul de atestare fiscală privind impozitele şi taxele locale şi alte venituri
                                    ale bugetului local, emis pe numele solicitantului de către autoritatea publică locală
                                    în a cărei rază teritorială îşi are domiciliul, în termen de valabilitate;
                                </li>
                                <li>
                                    certificatul de atestare fiscală privind impozitele şi taxele locale şi alte venituri
                                    ale bugetului local, emis pe numele solicitantului de către autoritatea publică locală
                                    în a cărei rază teritorială se va implementa proiectul, în termen de valabilitate;
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 d-flex mt-5 mt-lg-0">
                <div class="row">
                    <div class="col-12">
                        <div class="boxed-info">
                            <p class="mb-1">
                                <strong>
                                    Pașii principali în derularea proiectului:
                                </strong>
                            </p>

                            <p class="mb-0">
                                1. Depunere dosar complet la instalatorul autorizat;
                            </p>
                            <p class="mb-0">
                                2. Încărcarea documentelor de către instalator pe platforma AFM;
                            </p>
                            <p class="mb-0">
                                3. Validarea dosarelor de către AFM;
                            </p>
                            <p class="mb-0">
                                4. Semnarea contractelor de finanțare;
                            </p>
                            <p class="mb-0">
                                5. Implementarea proiectului;
                            </p>
                            <p class="mb-0">
                                6. Depunerea de către instalator a dosarului pentru decontarea proiectului;
                            </p>
                            <p class="mb-0">
                                7. Decontarea de către AFM;
                            </p>
                            <p class="mb-0">
                                8. Monitorizarea proiectului de către AFM. În acest moment, programul este închis și nu
                                se mai pot depune dosare în acest proiect.
                            </p>

                            <p class="mt-4">
                                <strong>
                                    Finanţarea se acordă în procent de până la 90% din valoarea totală a cheltuielilor eligibile,
                                    în limita sumei de 20.000 lei
                                </strong>
                            </p>

                            <p class="mb-0">
                                Statistică dosare FOMCO 2021
                            </p>
                            <p class="mb-0">
                                Dosare depuse: 637
                            </p>
                            <p class="mb-0">
                                Dosare validate până la 13.07.2022: 34
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="2019" class="container my-5">
        <div class="row">
            <div class="col">
                <div>
                    <h2>
                        <span>Program 2019</span>
                    </h2>
                    <div class="boxed-info mt-4">
                        <p class="mb-3"><strong>Statistică dosare Fomco</strong></p>
                        <p>
                            <strong>Dosare depuse:</strong> 324
                        </p>
                        <p>
                            <strong>Dosare transferate de la alți instalatori:</strong> 1
                        </p>
                        <p>
                            <strong>Proiecte câștigate și implementate:</strong> 52
                        </p>
                        <p>
                            <strong>Dosare câștigate, renunțate de către client:</strong> 5
                        </p>
                        <p>
                            <strong>Dosare decontate până la 13.07.2022:</strong> 256
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="container-fluid">--}}
{{--        <div class="row casa-verde-program">--}}
{{--            <div class="col my-auto text-wrapper">--}}
{{--                <div class="rest-wrapper-right ps-md-5">--}}
{{--                    <h2>--}}
{{--                        Program 2019--}}
{{--                    </h2>--}}
{{--                    <div class="boxed-info">--}}
{{--                        <p class="mb-3"><strong>Statistică dosare Fomco</strong></p>--}}
{{--                        <p>--}}
{{--                            <strong>Dosare depuse:</strong> 324--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            <strong>Dosare transferate de la alți instalatori:</strong> 1--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            <strong>Proiecte câștigate și implementate:</strong> 52--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            <strong>Dosare câștigate, renunțate de către client:</strong> 5--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            <strong>Dosare decontate până la 13.07.2022:</strong> 256--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="bg-yellow py-5">
        <div class="container">
            <div class="row my-10">
                <div class="col-12 col-md-7 my-auto">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <h2>
                                Completează formularul pentru o ofertă personalizată
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col text-center">
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
