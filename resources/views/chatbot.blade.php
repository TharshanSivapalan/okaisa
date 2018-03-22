<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OKAISA - Just For You</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="OKAISA - Just For You" />


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
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
                                <div class="chatbot">
                                    <div id="chatbot-box" class="text">
                                        Blabla
                                    </div>
                                </div>
                                <input id="chatbot-input">
                            </div>
                            <script>
                                //console.log($('#chatbot-input').text());
                                $('#chatbot-input').bind("enterKey",function(e){
                                    var newInput = $('#chatbot-input').val();
                                    newInput = encodeURIComponent(newInput);
                                    $('#chatbot-input').val('');
                                    $('#chatbot-box').append(newInput);
                                    ajaxLoad(newInput);

                                });
                                $('#chatbot-input').keyup(function(e){
                                    if(e.keyCode == 13)
                                    {
                                        $(this).trigger("enterKey");
                                    }
                                });

                                // On récupère en Ajax le contenu
                                function ajaxLoad(q){
                                    $.ajaxSetup({
                                        xhrFields: {
                                            withCredentials: true
                                        }
                                    });
                                    $.ajax({
                                        url : '/ajaxChat?q='+q,
                                        type : 'GET',
                                        dataType : 'html',
                                        xhrFields: {
                                            withCredentials: true
                                        },
                                        crossDomain: true,

                                        success: function(response, statut){
                                            // On le met dans album
                                            console.log("Success");
                                            console.log("response", response);
                                            console.log("statut", statut);
                                        },

                                        error: function(resultat, statut, erreur){
                                            // TODO: Gestion de l'erreur
                                            var strError = "<div class='error'>Une erreur est survenue pendant le chargement. Veuillez recharger la page.</div>"
                                            $('#chatbot-input').append(strError);
                                            console.log("Erreur Ajax.");
                                            console.log(resultat + " " + statut + " " + erreur);
                                        },

                                        complete: function(data) {
                                            $('#loading-image').hide();
                                        }
                                    })
                                }
                            </script>
                            <div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
                                <div class="form-wrap">
                                    <iframe
                                            width="350"
                                            height="430"
                                            src="https://console.dialogflow.com/api-client/demo/embedded/1264e3c4-589e-4734-991b-eaaa20000153">
                                    </iframe>
                                </div>
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
                    <li><a href="#"><img src="images/Pinterest.svg"></i></a></li>
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

</body>
</html>

