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

    <!--SWAL2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<header>
    <div class="container">
        <img src="/asset/img/travel_bucketlist_thumbnail.png" alt="Travel Bucketlist thumbnail">
        <h1 style="color:white;padding-left: 15px;">The Travel Bucketlist</h1>

    </div>

    <nav class="container" style="padding-Bottom:0px" id="navContainer">
        <a class="navigationItem" href="{{ url('/home')}}"><i class="fa fa-home"></i> Home</a>
        <a class="navigationItem" href="{{ url('/create')}}"><i class="fa fa-plus-square"></i> Create</a>
        <a class="navigationItem" href="{{ url('/')}}"><i class="fa fa-sign-out-alt"></i></a>
    </nav>
</header>

<body>
    @yield('content')

    <script>
        $(document).ready(function() {
            //Get CurrentUrl variable by combining origin with pathname, this ensures that any url appendings (e.g. ?RecordId=100) are removed from the URL
            var CurrentUrl = window.location.origin + window.location.pathname;
            //Check which menu item is 'active' and adjust apply 'active' class so the item gets highlighted in the menu
            //Loop over each <a> element of the NavMenu container
            $('#navContainer a').each(function(Key, Value) {
                //Check if the current url
                if (Value['href'] === CurrentUrl) {
                    //We have a match, add the 'active' class to the parent item (li element).
                    $(Value).addClass('active');
                }
            });
        });
    </script>
</body>




</html>
