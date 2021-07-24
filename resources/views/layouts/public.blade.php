<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Main Css -->
    <link rel="stylesheet" href="{{  url('css/landing.css') }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ url('assets/images/favicon.png') }}" />

    <title>{{ $website->name }}</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-main header sticky-top">
        <div class="container navbar-container">
            <a class="navbar-brand" href="https://www.mataonme.com/">
                <img class="img-fluid logo" src="assets/images/white-eyes-logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/features">Features <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/features#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                </ul>
                <form class="ml-auto">
                    @guest
                    <a href="{{ route('register') }}" class="btn btn-light rounded-pill">GET STARTED</a>
                    @endguest
                    @auth
                    <a href="{{ route('user.settings') }}" class="btn btn-light rounded-pill">
                        Settings <i class="fa fa-arrow-right"></i>
                    </a>
                    @endauth
                </form>
            </div>
        </div>
    </nav>
    <!-- / Navbar -->
    
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-light">
        <div class="container py-20" style="padding-top: 40px;padding-bottom: 20px;">
            <p class="text-center">All rights reserved for Mataonme.</p>
        </div>
    </div>
    <!-- / Footer -->

    <script>


                $('a[href^="#"]').on('click', function (e) {
                    e.preventDefault();
                  
                    var targetEle = this.hash;
                    var $targetEle = $(targetEle);
                  
                    $('html, body').stop().animate({
                        'scrollTop': $targetEle.offset().top
                    }, 8000, 'swing', function () {
                        window.location.hash = targetEle;
                    });
                });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>