<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Bucketlist Home</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <!--Font awesome -->
    <script src="https://kit.fontawesome.com/51c8a4d077.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.12.0/js/all.js" data-auto-replace-svg="nest"></script>

    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="\css\style.css" rel="stylesheet">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<header>
    <div class="container">
        <img src="/asset/img/travel_bucketlist_thumbnail.png" alt="Travel Bucketlist thumbnail">
        <h1 style="color:White;">Travel Bucketlist </h1>

    </div>

    <nav class="container" style="padding-Bottom:0px">
        <a class="navigationItem active" href="{{ url('/home')}}"><i class="fa fa-home"></i> Home</a>
        <a class="navigationItem " href="{{ url('/create')}}"><i class="fa fa-plus-square"></i> Create</a>
        <a class="navigationItem" href="{{ url('/')}}"><i class="fa fa-sign-out-alt"></i></a>
    </nav>
</header>

<body style="min-height:80%">
    <div class="flex-center full-height">

        <div style="margin:15px;width:70%">
            <p class="title" style="margin-bottom:0px">Welcome back <span class="displayName">Chin Kai Xiang</span></p>
            <p>Total visited<i class="fa fa-city icon"></i> : <span class="numofcities">25</span></p>
            <p class="caption">Last updated at 30-1-2020</p>
        </div>

        <div class="content" style="margin:15px;width:80%;overflow:scroll;">
            <section id="gallery">
                <div>
                    <div id="image-gallery">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                <div class="img-wrapper">
                                    <a href="https://unsplash.it/800"><img src="https://unsplash.it/800" class="img-responsive"></a>
                                    <div class="img-overlay">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="img-title-caption">
                                    <p class="travelLocation"><i class="fa fa-map-marker-alt"></i> Bangkok , Thailand</p>
                                    <p class="travelTitle">Travel to Bangkok</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                <div class="img-wrapper">
                                    <a href="https://unsplash.it/700"><img src="https://unsplash.it/700" class="img-responsive"></a>
                                    <div class="img-overlay">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="img-title-caption">
                                    <p class="travelLocation"><i class="fa fa-map-marker-alt"></i> Bangkok , Thailand</p>
                                    <p class="travelTitle">Travel to Bangkok</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                <div class="img-wrapper">
                                    <a href="https://unsplash.it/600"><img src="https://unsplash.it/600" class="img-responsive"></a>
                                    <div class="img-overlay">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="img-title-caption">
                                    <p class="travelLocation"><i class="fa fa-map-marker-alt"></i> Bangkok , Thailand</p>
                                    <p class="travelTitle">Travel to Bangkok</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                <div class="img-wrapper">
                                    <a href="https://unsplash.it/500"><img src="https://unsplash.it/500" class="img-responsive"></a>
                                    <div class="img-overlay">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="img-title-caption">
                                    <p class="travelLocation"><i class="fa fa-map-marker-alt"></i> Bangkok , Thailand</p>
                                    <p class="travelTitle">Travel to Bangkok</p>
                                </div>
                            </div>
                        </div><!-- End row -->
                    </div><!-- End image gallery -->
                </div><!-- End container -->

            </section>
        </div>
    </div>


    <script>
        // Gallery image hover
        $(".img-wrapper").hover(
            function() {
                $(this).find(".img-overlay").animate({
                    opacity: 1
                }, 600);
            },
            function() {
                $(this).find(".img-overlay").animate({
                    opacity: 0
                }, 600);
            }
        );
    </script>
</body>

<footer>
    <p class="footerText">Travel Bucketlist management system &copy; Created by Chin Kai Xiang , Tan Chee Kuan , Low Zi Jian.</p>
</footer>

</html>
