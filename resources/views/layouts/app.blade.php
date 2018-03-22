<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OKAISA - Just For You</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="OKAISA - Just For You" />


    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>



<body>

<div class="gtco-loader"></div>

<div id="page">


    <div class="page-inner">

        <!-- IMAGE DE FOND  -->




        <header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/fond.jpg)">


            <div class="overlay"></div>
            <div class="gtco-container">

                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-left">

                        <div class="row">
                            <div class="col-sm-4 col-xs-12">


                                <!-- logo -->


                                <div id="gtco-logo"><a href="index.html"><img src="images/logo.svg"> </a></div>
                            </div>
                        </div>

                        <div class=" test_logo_index row row-mt-15em">
                            <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                                <span class="intro-text-small">Welcome to Okaïsa</span>
                                <h1 style="font-size: 25px">Okaïsa permet de vous accompagner dans votre choix vestimentaire à tout instant.
                                    <br><br>Offrant à l’utilisateur une assistance personnalisée en fonction de son dressing, de ses goûts et
                                    de son style de vie.
                                </h1>
                            </div>
                            <div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
                                <div class="form-wrap">
                                    <div class="tab">
                                        <ul class="tab-menu">
                                            <li class="active gtco-first"><a href="#" data-tab="login">Login</a></li>
                                            <li class="gtco-second"><a href="#" data-tab="signup">Sign up</a></li>
                                        </ul>
                                        <div class="tab-content">


                                            <div class="tab-content-inner active" data-content="login">
                                                <form action="" method="post">
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label for="email">Username or Email</label>
                                                            <input type="text" class="form-control" name="email" id="email">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label for="password">Password</label>
                                                            <input type="password" name="password" class="form-control" id="password">
                                                        </div>
                                                    </div>
                                                    @if(session('message'))
                                                        <div class="row form-group">
                                                            <div class="col-md-12" style="color: #ca112e">
                                                                {{ session('message') }}
                                                            </div>
                                                        </div>
                                                    @EndIf

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-primary" value="Login">
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('password-lost') }}" style="color: black">Vous avez oublié votre de passe? Clique ici</a>
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>

                                            <div class="tab-content-inner " data-content="signup">
                                                <form action="#">
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label for="username">Username or Email</label>
                                                            <input type="text" class="form-control" id="username">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" id="password">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label for="password2">Repeat Password</label>
                                                            <input type="password" class="form-control" id="password2">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <a href="#" class="bouton2">Check & Go</a>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-primary" value="Sign up">
                                                        </div>
                                                    </div>
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </header>

    </div>


    @yield('content')
    <footer id="gtco-footer" role="contentinfo">
        <div class="gtco-container">
            <div class="row copyright">
                <div class="col-md-12">
                    <p class="pull-left">
                        <small class="block">Mentions légales</small>
                        <small class="block">Cookies</small>
                        <small class="block">Condition générales d'utilisation</small>
                    </p>
                    <p class="pull-right">
                        <ul class="gtco-social-icons pull-right">
                    <p>Nos Réseaux Sociaux:</p>
                    <li><a href="#"><img src="images/Facebook.svg"></a></li>
                    <li><a href="#"><img src="images/Instagram.svg"></a></li>
                    <li><a href="#"><img src="images/Pinterest.png"></i></a></li>
                    <li><a href="#"><img src="images/Twitter.svg"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="js/jquery.countTo.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>

</body>
</html>

