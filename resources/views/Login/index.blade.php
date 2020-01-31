<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Bucketlist</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <!--Font awesome -->
    <script src="https://kit.fontawesome.com/51c8a4d077.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.12.0/js/all.js" data-auto-replace-svg="nest"></script>

    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="\css\style.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body onload="typeWriter()">

    <div class="flex-center full-height">
        <div class="content">
            <img src="/asset/img/travel_bucketlist_logo.png" alt="Travel Bucketlist logo" style="width:500px;height:300px;min-width:200px">
            <p class="quote" id="quote"></p>
        </div>

        <p class="title">Welcome to Travel Bucketlist</p>

        <form class="inputform">
            <div class="input-container">
                <i class="fa fa-user icon icon input-form-icon"></i>
                <input type="text" class="input-form-container" placeholder="Enter your username" id="usernameField">
            </div>

            <div class="input-container">
                <i class="fa fa-key icon input-form-icon"></i>
                <input type="password" class="input-form-container" placeholder="Enter your password" id="passwordField">
                <i class="fas fa-eye-slash icon icon input-form-icon" style="padding-Left:5px;padding-Right:0px;" id="eye-password"></i>
            </div>

            <p class="errorHelperText">Incorrect Username & Password</p>

            <div class="content">
                <button class="btnPrimary" type="button">Login</button>
            </div>

        </form>

        <p style="margin-Bottom:30px;margin-Top:30px;" class="helperText">Don't have an account? <a class="link"
        href="{{ url('register')}}"> Sign up </a> </p>

    </div>


    <!-- showPassword -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#eye-password').on('click', function() {
                showPassword(),
                    $(this)
                    .find('[data-fa-i2svg]')
                    .toggleClass('fa-eye-slash')
                    .toggleClass('fa-eye');

            })
        });

        function showPassword() {
            var pw = document.getElementById("passwordField");
            if (pw.type === "password") {
                pw.type = "text";
            } else {
                pw.type = "password";
            }
        }
    </script>

    <!-- generate quote of the day -->

    <script>
        var i = 0;
        var quote = [`“The gladdest moment in human life is a departure into unknown lands.” – Sir Richard Burton`,
            `“Travel makes one modest. You see what a tiny place you occupy in the world.” -Gustav Flaubert`,
            `“Traveling – it leaves you speechless, then turns you into a storyteller.” – Ibn Battuta`,
            `“To Travel is to Live” – Hans Christian Andersen`,
            `“Travel and change of place impart new vigor to the mind.” – Seneca`,
            `“Life is either a daring adventure or nothing at all” - Helen Keller`,
            `“Adventure is worthwhile.” – Aesop`,
            `“A journey is best measured in friends, rather than miles.” – Tim Cahill`
        ]
        var txt = quote[Math.floor(Math.random() * quote.length)]
        var speed = 50; /* The speed/duration of the effect in milliseconds */

        function typeWriter() {
            if (i < txt.length) {
                document.getElementById("quote").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            }
        }
    </script>

</body>

<footer>
    <p class="footerText">Travel Bucketlist management system &copy; Created by Chin Kai Xiang , Tan Chee Kuan , Low Zi Jian.</p>
</footer>

</html>
