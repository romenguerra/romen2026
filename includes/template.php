<?php

    class Template
    {
        

        static function header($titulo,$descripcion='',$author='1DAW')
        {
            return "
            
                <!DOCTYPE html>
                <html class=\"no-js\" lang=\"zxx\">

                <head>
                    <meta charset=\"utf-8\" />
                    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\" />
                    <title>Appvilla - Creative Landing Page HTML Template.</title>
                    <meta name=\"description\" content=\"\" />
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
                    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"assets/plantilla/assets/images/favicon.svg\" />

                    <!-- ========================= CSS here ========================= -->
                    <link rel=\"stylesheet\" href=\"assets/plantilla/assets/css/bootstrap.min.css\" />
                    <link rel=\"stylesheet\" href=\"assets/plantilla/assets/css/LineIcons.2.0.css\" />
                    <link rel=\"stylesheet\" href=\"assets/plantilla/assets/css/animate.css\" />
                    <link rel=\"stylesheet\" href=\"assets/plantilla/assets/css/tiny-slider.css\" />
                    <link rel=\"stylesheet\" href=\"assets/plantilla/assets/css/glightbox.min.css\" />
                    <link rel=\"stylesheet\" href=\"assets/plantilla/assets/css/main.css\" />

                </head>
            
            ";
        }


        static function nav()
        {

            return "
                    <header class=\"header navbar-area\">
                        <div class=\"container\">
                            <div class=\"row align-items-center\">
                                <div class=\"col-lg-12\">
                                    <div class=\"nav-inner\">
                                        <!-- Start Navbar -->
                                        <nav class=\"navbar navbar-expand-lg\">
                                            <a class=\"navbar-brand\" href=\"index.html\">
                                                <img src=\"assets/plantilla/assets/images/logo/white-logo.svg\" alt=\"Logo\">
                                            </a>
                                            <button class=\"navbar-toggler mobile-menu-btn\" type=\"button\" data-bs-toggle=\"collapse\"
                                                data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\"
                                                aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                                                <span class=\"toggler-icon\"></span>
                                                <span class=\"toggler-icon\"></span>
                                                <span class=\"toggler-icon\"></span>
                                            </button>
                                            <div class=\"collapse navbar-collapse sub-menu-bar\" id=\"navbarSupportedContent\">
                                                <ul id=\"nav\" class=\"navbar-nav ms-auto\">
                                                    <li class=\"nav-item\">
                                                        <a href=\"#home\" class=\"page-scroll active\"
                                                            aria-label=\"Toggle navigation\">Home</a>
                                                    </li>
                                                    <li class=\"nav-item\">
                                                        <a href=\"#features\" class=\"page-scroll\"
                                                            aria-label=\"Toggle navigation\">Features</a>
                                                    </li>
                                                    <li class=\"nav-item\">
                                                        <a href=\"javascript:void(0)\" aria-label=\"Toggle navigation\">Overview</a>
                                                    </li>
                                                    <li class=\"nav-item\">
                                                        <a href=\"#pricing\" class=\"page-scroll\"
                                                            aria-label=\"Toggle navigation\">Pricing</a>
                                                    </li>
                                                    <li class=\"nav-item\">
                                                        <a href=\"javascript:void(0)\" aria-label=\"Toggle navigation\">Team</a>
                                                    </li>
                                                    <li class=\"nav-item\">
                                                        <a class=\"dd-menu collapsed\" href=\"javascript:void(0)\" data-bs-toggle=\"collapse\"
                                                            data-bs-target=\"#submenu-1-4\" aria-controls=\"navbarSupportedContent\"
                                                            aria-expanded=\"false\" aria-label=\"Toggle navigation\">Blog</a>
                                                        <ul class=\"sub-menu collapse\" id=\"submenu-1-4\">
                                                            <li class=\"nav-item\"><a href=\"javascript:void(0)\">Blog Grid Sidebar</a>
                                                            </li>
                                                            <li class=\"nav-item\"><a href=\"javascript:void(0)\">Blog Single</a></li>
                                                            <li class=\"nav-item\"><a href=\"javascript:void(0)\">Blog Single
                                                                    Sibebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class=\"nav-item\">
                                                        <a href=\"javascript:void(0)\" aria-label=\"Toggle navigation\">Contact</a>
                                                    </li>
                                                </ul>
                                            </div> <!-- navbar collapse -->
                                            <div class=\"button add-list-button\">
                                                <a href=\"javascript:void(0)\" class=\"btn\">Get it now</a>
                                            </div>
                                        </nav>
                                        <!-- End Navbar -->
                                    </div>
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                    </header>
            ";

        }


        static function footer(){

            return "
                <footer class=\"footer\">
                <!-- Start Footer Top -->
                <div class=\"footer-top\">
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col-lg-4 col-md-4 col-12\">
                                <!-- Single Widget -->
                                <div class=\"single-footer f-about\">
                                    <div class=\"logo\">
                                        <a href=\"index.html\">
                                            <img src=\"assets/images/logo/white-logo.svg\" alt=\"#\">
                                        </a>
                                    </div>
                                    <p>Making the world a better place through constructing elegant hierarchies.</p>
                                    <ul class=\"social\">
                                        <li><a href=\"javascript:void(0)\"><i class=\"lni lni-facebook-filled\"></i></a></li>
                                        <li><a href=\"javascript:void(0)\"><i class=\"lni lni-twitter-original\"></i></a></li>
                                        <li><a href=\"javascript:void(0)\"><i class=\"lni lni-instagram\"></i></a></li>
                                        <li><a href=\"javascript:void(0)\"><i class=\"lni lni-linkedin-original\"></i></a></li>
                                        <li><a href=\"javascript:void(0)\"><i class=\"lni lni-youtube\"></i></a></li>
                                        <li><a href=\"javascript:void(0)\"><i class=\"lni lni-pinterest\"></i></a></li>
                                    </ul>
                                    <p class=\"copyright-text\">Designed and Developed by <a href=\"https://uideck.com/\"
                                            rel=\"nofollow\" target=\"_blank\">UIdeck</a>. <br> Distributed by <a href=\"https://themewagon.com\" target=\"_blank\">ThemeWagon</a>
                                    </p>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class=\"col-lg-8 col-md-8 col-12\">
                                <div class=\"row\">
                                    <div class=\"col-lg-3 col-md-6 col-12\">
                                        <!-- Single Widget -->
                                        <div class=\"single-footer f-link\">
                                            <h3>Solutions</h3>
                                            <ul>
                                                <li><a href=\"javascript:void(0)\">Marketing</a></li>
                                                <li><a href=\"javascript:void(0)\">Analytics</a></li>
                                                <li><a href=\"javascript:void(0)\">Commerce</a></li>
                                                <li><a href=\"javascript:void(0)\">Insights</a></li>
                                                <li><a href=\"javascript:void(0)\">Promotion</a></li>
                                            </ul>
                                        </div>
                                        <!-- End Single Widget -->
                                    </div>
                                    <div class=\"col-lg-3 col-md-6 col-12\">
                                        <!-- Single Widget -->
                                        <div class=\"single-footer f-link\">
                                            <h3>Support</h3>
                                            <ul>
                                                <li><a href=\"javascript:void(0)\">Pricing</a></li>
                                                <li><a href=\"javascript:void(0)\">Documentation</a></li>
                                                <li><a href=\"javascript:void(0)\">Guides</a></li>
                                                <li><a href=\"javascript:void(0)\">API Status</a></li>
                                                <li><a href=\"javascript:void(0)\">Live Support</a></li>
                                            </ul>
                                        </div>
                                        <!-- End Single Widget -->
                                    </div>
                                    <div class=\"col-lg-3 col-md-6 col-12\">
                                        <!-- Single Widget -->
                                        <div class=\"single-footer f-link\">
                                            <h3>Company</h3>
                                            <ul>
                                                <li><a href=\"javascript:void(0)\">About Us</a></li>
                                                <li><a href=\"javascript:void(0)\">Our Blog</a></li>
                                                <li><a href=\"javascript:void(0)\">Jobs</a></li>
                                                <li><a href=\"javascript:void(0)\">Press</a></li>
                                                <li><a href=\"javascript:void(0)\">Contact Us</a></li>
                                            </ul>
                                        </div>
                                        <!-- End Single Widget -->
                                    </div>
                                    <div class=\"col-lg-3 col-md-6 col-12\">
                                        <!-- Single Widget -->
                                        <div class=\"single-footer f-link\">
                                            <h3>Legal</h3>
                                            <ul>
                                                <li><a href=\"javascript:void(0)\">Terms & Conditions</a></li>
                                                <li><a href=\"javascript:void(0)\">Privacy Policy</a></li>
                                                <li><a href=\"javascript:void(0)\">Catering Services</a></li>
                                                <li><a href=\"javascript:void(0)\">Customer Relations</a></li>
                                                <li><a href=\"javascript:void(0)\">Innovation</a></li>
                                            </ul>
                                        </div>
                                        <!-- End Single Widget -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Footer Top -->
            </footer>
            <!--/ End Footer Area -->

            <!-- ========================= scroll-top ========================= -->
            <a href=\"#\" class=\"scroll-top\">
                <i class=\"lni lni-chevron-up\"></i>
            </a>

            <!-- ========================= JS here ========================= -->
            <script src=\"assets/js/bootstrap.min.js\"></script>
            <script src=\"assets/js/wow.min.js\"></script>
            <script src=\"assets/js/tiny-slider.js\"></script>
            <script src=\"assets/js/glightbox.min.js\"></script>
            <script src=\"assets/js/count-up.min.js\"></script>
            <script src=\"assets/js/main.js\"></script>
            <script type=\"text/javascript\">

                //====== counter up 
                var cu = new counterUp({
                    start: 0,
                    duration: 2000,
                    intvalues: true,
                    interval: 100,
                    append: \" \",
                });
                cu.start();
            </script>
        </body>

        </html>
        ";

        }


    }