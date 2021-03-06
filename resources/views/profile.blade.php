<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OKAISA - Just For You</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="OKAISA - Just For You"/>


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
                    <div class="col-md-12  text-left">


                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="row">
                                    <!-- logo -->
                                    <div class="col-md-3">
                                        <div id="gtco-logo2"><a href="/"><img src="images/logo.svg"></a></div>
                                    </div>

                                    <div class="col-md-9 text-right menu-bas">
                                        <div class="hamburger hamburger--3dx">
                                            <div class="hamburger-box">
                                                <div class="hamburger-inner"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="dropDown" class="row">
                                <div class="col-lg-12">
                                    <ul class="list list-unstyled text-center">
                                        <li><a class="sous-menu" href="profile">Profil</a></li>
                                        <li><a class="sous-menu" href="assistant">Mon assitant</a></li>
                                        <li><a class="sous-menu" href="#">Contact</a></li>
                                        <li><a class="sous-menu" href="logout">Déconnexion</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class=" test_logo_profile test_logo row">
                            <div class="profile_pict text-center">
                                @If($user['gender']=='f')
                                    <img src="images/portrait-ellipse1.png">
                                @Else
                                    <img src="images/portrait-ellipse2.png">
                                @EndIf
                                <h2 class="center-text">{{ucfirst($user['first_name'])}} {{ucfirst($user['last_name'])}}</h2>
                                <h4 class="center-text white_text">{{ucfirst($user['city'])}}
                                    , {{strtoupper($user['country'])}}</h4>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </header>

    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    <div class="gtco-section border-bottom">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 profil_form">
                    <div class="col-md-12 form_profile animate-box ">
                        <h3 class="style_text">Informations personelles</h3>
                        {!! Form::open(['url' => 'profile/update', 'method' => 'post']) !!}
                        <div class="row form-group">
                            <div class="col-md-8">

                                <input type="text" id="nom" name="last_name" class="form-control_profile form-control"
                                       placeholder="Nom"
                                       value="{{$user['last_name']}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-8">

                                <input type="text" id="prénom" name="first_name"
                                       class="form-control_profile form-control" placeholder="Prénom"
                                       value="{{$user['first_name']}}">
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-8">

                                <input type="text" id="email" name="email" class="form-control_profile form-control"
                                       placeholder="Adresse email*"
                                       value="{{$user['email']}}" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-8">

                                <input type="password" id="password" name="password"
                                       class="form-control_profile form-control" placeholder="Mot de passe">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-8">

                                <input type="text" class="form-control_profile form-control" name="phone"
                                       placeholder="Numéro de téléphone"
                                       value="{{$user['phone']}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-8">
                                <input type="text" id="pays" class="form-control_profile form-control" name="country"
                                       placeholder="Pays"
                                       value="{{$user['country']}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-8">
                                <input type="text" id="ville" class="form-control_profile form-control" name="city"
                                       placeholder="Ville"
                                       value="{{$user['city']}}">
                            </div>
                        </div>


                        <div class="prompt">
                            Sexe:
                            <label class="radio-wrapper">
                                <span class="radio-bg"></span>
                                @If($user['gender']=='f')
                                    <input type="radio" name="gender" value="f" checked="checked"/>
                                @Else
                                    <input type="radio" name="gender" value="f"/>
                                @EndIf
                                <span class="dot"></span>
                                <span class="radio-label">Femme</span>
                            </label>

                            <label class="radio-wrapper">
                                <span class="radio-bg"></span>
                                @If($user['gender']=='h')
                                    <input type="radio" name="gender" value="h" checked="checked"/>
                                @Else
                                    <input type="radio" name="gender" value="h"/>
                                @EndIf
                                <span class="dot"></span>
                                <span class="radio-label">Homme</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="sauvegarder" class="btn btn-primary">
                            <input type="submit" value="modifier" class="btn btn-primary">
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <li><a href="#"><img src="images/Pinterest.png"></a></li>
                    <li><a href="#"><img src="images/Twitter.svg"></a></li>
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

    <script>
        var click = false;
        $(document).on('click', '.hamburger--3dx', function () {
            click = !click;
            if (click) {
                $(this).addClass('is-active');
                $("#dropDown").hide().animate({
                    height: 'toggle'
                });
            } else {
                $(this).removeClass('is-active');
                $("#dropDown").show().animate({
                    height: 'toggle'
                });
            }
        });
    </script>

</body>
</html>

