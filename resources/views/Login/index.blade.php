@extends('layouts.app')

@section('content')

<body onload="typeWriter()">

    <div class="flex-center full-height">
        <div class="content" style="margin-Bottom:0px">
            <img src="/asset/img/travel_bucketlist_logo.png" alt="Travel Bucketlist logo" class="img-logo">
            <p class="quote" id="quote"></p>
        </div>

        <p class="title">Welcome to The Travel Bucketlist</p>

        <form class="inputform" method="POST" action="/login">
            @csrf
            <div class="input-container">
                <i class="far fa-envelope icon input-form-icon"></i>
                <input type="email" name="email" class="input-form-container" placeholder="Enter your email" id="email">
            </div>

            <div class="input-container">
                <i class="fa fa-key icon input-form-icon"></i>
                <input type="password" name="password" class="input-form-container" placeholder="Enter your password" id="passwordField">
                <i class="fas fa-eye-slash icon icon input-form-icon" style="padding-Left:5px;padding-Right:0px;" id="eye-password"></i>
            </div>
            @if($errors->any())
            <p class="errorHelperText">{{$errors->first()}}</p>
            @endif

            <div class="content">
                <input type="submit" class="btnPrimary" value="Login">
            </div>

        </form>

        <p style="margin-Bottom:30px;margin-Top:30px;" class="helperText">Don't have an account? <a class="link" href="{{ url('register')}}"> Sign up </a> </p>

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

@endsection
