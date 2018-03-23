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

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
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
                                            <div id="gtco-logo2"><a href="index.html"><img src="images/logo.svg"></a></div>
                                        </div>

                                        <div class="col-md-9 text-right menu-bas">

                                            <div class="col-md-2 col-md-offset-9">
                                                <div class="profile_pict_ass">
                                                    @If($user['gender']=='f')
                                                        <img src="images/portrait-ellipse1.png">
                                                    @Else
                                                        <img src="images/portrait-ellipse2.png">
                                                    @EndIf
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="hamburger hamburger--3dx">
                                                    <div class="hamburger-box">
                                                        <div class="hamburger-inner"></div>
                                                    </div>
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
                                            <li><a class="sous-menu" href="profile">A propos</a></li>
                                            <li><a class="sous-menu" href="assistant">Mon assitant</a></li>
                                            <li><a class="sous-menu" href="#">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class=" test_logo_profile test_logo bann_ass test_bann_ass row text-center">
                    <h1>Bonjour {{ucfirst($user['first_name'])}}</h1><br>
                    <p class="text_bann">Nous sommes le dimanche 23 Mars 2018</p>
                    <p class="text_bann">Il est {{date('H:i',time() + 3600)}}, il pleut. <object id="svg1" data="/images/weather/rainy-4.svg" type="image/svg+xml"></object></p>
                </div>
            </header>

        </div>


        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
        </div>
        <div class="gtco-section border-bottom">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-1 profil_form">
                        <div class="col-md-8 con">
                            <img src="images/icon_femme.png" width="45%">
                        </div>
                        <div class="col-md-4">
                            <div class="avenue-messenger">
                                <div class="menu">
                                    <div class="items"><span>
                     <a href="#" title="Minimize">&mdash;</a><br>
                                                            <!--
                                                                 <a href="">enter email</a><br>
                                                                 <a href="">email transcript</a><br>-->
                     <a href="#" title="End Chat">&#10005;</a>

                     </span></div>
                                </div>
                                <div class="chat">
                                    <div class="chat-title">
                                    </div>
                                    <div class="messages">
                                        <div class="messages-content"></div>
                                    </div>
                                    <div class="message-box">
                                        <input id="chatbot-input" type="text" class="message-input" >
                                        <!-- <button type="submit" class="message-submit">Send</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
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
                        <li><a href="#"><img src="images/Pinterest.png"></i></a></li>
                        <li><a href="#"><img src="images/Twitter.svg"></i></a></li>
                        </ul>
                        </p>
                    </div>
                </div>

            </div>
        </footer>


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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js'></script>

        <script  src="js/chat.js"></script>

        <script>
            var click = false;
            $(document).on('click', '.hamburger--3dx', function () {
                click = !click;
                if(click) {
                    $(this).addClass('is-active');
                    $("#dropDown").hide().animate({
                        height: 'toggle'
                    });
                }else {
                    $(this).removeClass('is-active');
                    $("#dropDown").show().animate({
                        height: 'toggle'
                    });
                }
            });
        </script>

    </body>
</html>
