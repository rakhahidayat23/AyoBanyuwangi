<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ayo Banyuwangi</title>
<!-- 
Journey Template 
http://www.templatemo.com/tm-511-journey
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href= "<?= base_url()?>assets/user/font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href= "<?= base_url()?>assets/user/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/user/css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/user/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/user/slick/slick-theme.css"/>
    <link rel="stylesheet" href= "<?= base_url()?>assets/user/css/templatemo-style.css">                                   <!-- Templatemo style -->

    <!-- load JS files -->
    <script src= "<?= base_url()?>assets/user/js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
    <script src= "<?= base_url()?>assets/user/js/popper.min.js"></script>                    <!-- https://popper.js.org/ -->       
    <script src= "<?= base_url()?>assets/user/js/bootstrap.min.js"></script>                 <!-- https://getbootstrap.com/ -->
    <script src= "<?= base_url()?>assets/user/js/datepicker.min.js"></script>                <!-- https://github.com/qodesmith/datepicker -->
    <script src= "<?= base_url()?>assets/user/js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
    <script src= "<?= base_url()?>assets/user/slick/slick.min.js"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
    <script src= "<?= base_url()?>assets/user/js/jquery.scrollTo.min.js"></script>           <!-- https://github.com/flesler/jquery.scrollTo -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
      </head>

      <body>
        <div class="tm-main-content" id="top">
            <div class="tm-top-bar-bg"></div>    
            <div class="tm-top-bar" id="tm-top-bar">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-expand-lg narbar-light">
                            <a class="navbar-brand mr-auto" href="<?= base_url()?>">
                                <img src= "<?= base_url()?>assets/user/img/logo.png" alt="Site logo">
                                Ayo Banyuwangi
                            </a>
                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                                <ul class="navbar-nav ml-auto">
                                  <li class="nav-item">
                                    <a class="nav-link active" href="<?= base_url()?>product">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url()?>#tm-section-2">Top Destinations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url()?>#tm-section-3">Recommended Places</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url()?>#tm-section-4">Maps</a>
                                </li>
                            </ul>
                        </div>                            
                    </nav>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- .tm-top-bar -->

        <div class="tm-page-wrap mx-auto">    
            <?= $content?>
            <footer class="tm-container-outer">
                <p class="mb-0">Copyright © <span class="tm-current-year"></span> Ayo Banyuwangi.</p>
            </footer>
        </div>
    </div> <!-- .main-content -->

    <script> 
        
        /* DOM is ready
        ------------------------------------------------*/
        $(function(){
            function loadGoogleMap(){
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCoti5iRsw319mDc9NxFsJAMWGTJRUSDkI&sensor=false&' + 'callback=initialize';
                document.body.appendChild(script);
            } 

            // Change top navbar on scroll
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 100) {
                    $(".tm-top-bar").addClass("active");
                } else {                    
                 $(".tm-top-bar").removeClass("active");
                }
            });

            // Smooth scroll to search form
            $('.tm-down-arrow-link').click(function(){
                $.scrollTo('#tm-section-search', 300, {easing:'linear'});
            });

            $('.btn-continue').click(function(){
                $.scrollTo('#tm-section-2', 300, {easing:'linear'});
            });

            // Update nav links on scroll
            $('#tm-top-bar').singlePageNav({
                currentClass:'active',
                offset: 60
            });

            // Close navbar after clicked
            $('.nav-link').click(function(){
                $('#mainNav').removeClass('show');
            });

            // Slick Carousel
            $('.tm-slideshow').slick({
                infinite: true,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });

            loadGoogleMap();                                       // Google Map                
            $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright           
        });
        
        $('#typeSpot').on('change',function (e) {
            $('#btnSubmitType').attr('href',this.value)
        });
    </script>             

</body>
</html>