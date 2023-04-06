<!DOCTYPE html>
<html class="{{$htmlClass ?? ''}}" style="overflow: hidden">
    <head>

        <title>Sapi</title>

        <meta charset="utf-8">

        @yield('meta')

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">

        <link href="https://fonts.cdnfonts.com/css/raleway-5" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">


    </head>

    <body class="{{$bodyClass ?? ''}}">
        <div id="app">
            @yield('wrapper')
        </div>

        @routes

        <script>
            window.addEventListener('load', function() {
                let message = { height: document.body.scrollHeight + 200 }
                console.log(message)
                window.top.postMessage(message, "*")
            })
        </script>

        <script>
            window.mixins = [
                {
                    data: {
                        appURL: {!! json_encode(url('/')) !!},
                        packageData: {!! $packageData !!},
                        @if(env('APP_ENV') == 'production')
                        isProduction: true
                        @else
                        isProduction: false
                        @endif
                    },

                    mounted() {
                        //document.addEventListener('contextmenu', event => event.preventDefault());
                    },
                }
            ]
        </script>

        @stack('js')

        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    </body>
</html>
