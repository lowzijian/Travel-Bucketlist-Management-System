<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Travel BucketList</title>

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
    <div class="header-container row col-md-12" style="padding-left: 50px;">
        <img src="/asset/img/travel_bucketlist_thumbnail.png" alt="Travel Bucketlist thumbnail">
        <h1 style="color:white;padding-left: 15px;font-size: 3.25rem;">The Travel Bucketlist</h1>

    </div>

    <nav class="header-container" style="padding-Bottom:0px">
        <a class="navigationItem" href="{{ url('/logout')}}"><i class="fa fa-sign-out-alt"></i></a>
    </nav>
</header>

<body>
    @yield('content')
</body>

<footer>
    <span class="footerText">Travel Bucketlist management system &copy; Created by Chin Kai Xiang , Tan Chee Kuan , Lee Hoe Mun , Low Zi Jian.</span>
</footer>


</html>
