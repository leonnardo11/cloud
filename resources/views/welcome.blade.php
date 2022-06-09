<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Index - ECOIN</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>
<body>
    <header>
        @include('layouts.navigation')
        <div class="main-video">
            <h1 class="animate__animated animate__bounce">ECOIN - SUA LOJA PREFERIDA GAMER</h1>
            <video src="images/valorant-video.mp4" id="vid" autoplay loop></video>
        </div>
    </header>
    <main>
        <h1>Battle</h1>
        @include('components.game-cardBATTLE')

        <h1>FPS</h1>
        @include('components.game-cardFPS')

        <h1>MOBA</h1>
        @include('components.game-cardMOBA')
    </main>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <script type="text/javascript">
        $('.products').slick({
            infinite: true,
            variableWidth: true,
            autoplay: true,
            autoplaySpeed: 2000,


        });
    </script>
    @include('layouts.footer')
</body>
