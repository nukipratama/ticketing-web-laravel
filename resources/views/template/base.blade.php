<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="TicketApp - Event Ticketing App">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title> TicketApp - Event Ticketing App</title>
    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="{{asset("template/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="{{asset("template/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("template/css/et-line.css")}}" rel="stylesheet">
    <link href="{{asset("template/css/ionicons.min.css")}}" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="{{asset("template/css/owl.carousel.min.css")}}" rel="stylesheet">
    <link href="{{asset("template/css/owl.theme.default.min.css")}}" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset("template/css/animate.min.css")}}">
    <!-- Custom styles for this template -->
    <link href="{{asset("template/css/main.css")}}" rel="stylesheet">
    @yield('custom-css')
</head>

<body>
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>

    <!--header start here -->
    <header class="header navbar fixed-top navbar-expand-md" id="navbar">
        <div class="container">
            <a class="navbar-brand logo text-white" href="/">
                <img src="{{asset("template/img/telrun.png")}}" class="img-fluid w-50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="lnr lnr-text-align-right"></span>
            </button>
            <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
                <ul class="nav navbar-nav menu">
                    <li class="nav-item">
                        <a class="nav-link " href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/ticket">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/information">Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!--header end here-->

    @yield('content')

    <!--footer start -->
    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 col-12">
                    <div class="footer_box">
                        <div class="footer_header">
                            <div class="footer_logo text-center">
                                <img src="{{asset("template/img/telrun.png")}}" class="img-fluid w-75">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer_box">
                        <div class="footer_header">
                            <h4 class="footer_title">
                                Social Media
                            </h4>
                        </div>
                        <div class="footer_box_body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida
                                tempus. Integer iaculis in aazzzCurabitur a pulvinar nunc. Maecenas laoreet finibus
                                lectus, at volutpat ligula euismod.
                            </p>
                            <ul class="footer_social">
                                <li>
                                    <a href="#"><i class="ion-social-pinterest"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-dribbble"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="footer_box">
                        <div class="footer_header">
                            <h4 class="footer_title">
                                instagram
                            </h4>
                        </div>
                        <div class="footer_box_body">
                            <ul class="instagram_list">
                                <li>
                                    <a href="#">
                                        <img src="{{asset("template/img/cleander/c1.png")}}" alt="instagram">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset("template/img/cleander/c2.png")}}" alt="instagram">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset("template/img/cleander/c3.png")}}" alt="instagram">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset("template/img/cleander/c3.png")}}" alt="instagram">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset("template/img/cleander/c2.png")}}" alt="instagram">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset("template/img/cleander/c1.png")}}" alt="instagram">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </footer>
    <div class="copyright_footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <p>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This website is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://github.com/nukipratama" target="_blank">Nuki</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--footer end -->

    {{-- hide navbar on scroll --}}
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
          if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
          } else {
            document.getElementById("navbar").style.top = "-100px";
          }
          prevScrollpos = currentScrollPos;
        }
    </script>
    <!-- jquery -->
    <script src="{{asset("template/js/jquery.min.js")}}"></script>
    <!-- bootstrap -->
    <script src="{{asset("template/js/popper.js")}}"></script>
    <script src="{{asset("template/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("template/js/waypoints.min.js")}}"></script>
    <!--slick carousel -->
    <script src="{{asset("template/js/owl.carousel.min.js")}}"></script>
    <!--parallax -->
    <script src="{{asset("template/js/parallax.min.js")}}"></script>
    <!--Counter up -->
    <script src="{{asset("template/js/jquery.counterup.min.js")}}"></script>
    <!--Counter down -->
    <script src="{{asset("template/js/jquery.countdown.min.js")}}"></script>
    <!-- WOW JS -->
    <script src="{{asset("template/js/wow.min.js")}}"></script>
    <!-- Custom js -->
    <script src="{{asset("template/js/main.js")}}"></script>
    @yield('custom-js')
</body>

</html>