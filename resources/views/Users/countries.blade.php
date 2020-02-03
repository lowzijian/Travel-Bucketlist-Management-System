<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Bucketlist Countries</title>

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
        <h1 style="color:White;">The Travel Bucketlist</h1>
    </div>

    <nav class="container" style="padding-Bottom:0px">
        <a class="navigationItem" href="{{ url('/home')}}"><i class="fa fa-home"></i> Home</a>
        <a class="navigationItem" href="{{ url('/create')}}"><i class="fa fa-plus-square"></i> Create</a>
        <a class="navigationItem active" href="{{ url('/countries')}}"><i class="fa fa-compass"></i> Countries</a>
        <a class="navigationItem" href="{{ url('/')}}"><i class="fa fa-sign-out-alt"></i></a>
    </nav>
</header>

<body style="min-height:80%">
    <div class="flex-center full-height col-md-12">

        <div style="margin:15px;width:70%">
            <p class="title" style="margin-bottom:0px">Your Travel Bucketlist Countries</p>
            <p>Total bucket list<i class="fa fa-flag icon"></i> : <span class="num">2</span></p>
            <p class="caption">Last updated at 30-1-2020</p>
        </div>

        <div style="margin:15px;width:70%;">
            <div class="row bucketListCard col-md-12 withMarginVertical">
                <div class="row">
                    <img class="col-md-3" src="https://restcountries.eu/data/afg.svg" alt="FlagOfTheCountry" style=" object-fit: cover; height: 100px;">
                    <div class="col-md-9 column">
                        <p class="locationTitle">Afghanistan</p>
                        <p class="locationRegion">Asia</p>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-landmark"></i> Captital City</p>
                            <p class="col-md-3">Kabul</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-users"></i> Population</p>
                            <p class="col-md-3">27657145</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-language"></i> Languages</p>
                            <p class="col-md-3">Pashto,Uzbek,Turkmen</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-money-bill-wave"></i> Currencies</p>
                            <p class="col-md-3">AFN <span class="caption">(؋)</span></p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row bucketListCard col-md-12 withMarginVertical">
                <div class="row">
                    <img class="col-md-3" src="https://restcountries.eu/data/afg.svg" alt="FlagOfTheCountry" style=" object-fit: cover; height: 100px;">
                    <div class="col-md-9 column">
                        <p class="locationTitle">Afghanistan</p>
                        <p class="locationRegion">Asia</p>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-landmark"></i> Captital City</p>
                            <p class="col-md-3">Kabul</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-users"></i> Population</p>
                            <p class="col-md-3">27657145</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-language"></i> Languages</p>
                            <p class="col-md-3">Pashto,Uzbek,Turkmen</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-money-bill-wave"></i> Currencies</p>
                            <p class="col-md-3">AFN <span class="caption">(؋)</span></p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="withMarginVertical col-md-12 row" style="justify-content:flex-end;">
                <button class="btnPrimary" style="width:auto;" type="submit" id="Add" name="Add">Add a travel bucketlist country</button>
            </div>
        </div>

    </div>


</body>

<footer>
    <p class="footerText">Travel Bucketlist management system &copy; Created by Chin Kai Xiang , Tan Chee Kuan , Low Zi Jian.</p>
</footer>

</html>
