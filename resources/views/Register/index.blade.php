@extends('layouts.app')

@section('content')



<body>
    <div class="flex-center full-height">
        <div class="content" style="margin-Bottom:0px">
            <img src="/asset/img/travel_bucketlist_logo.png" alt="Travel Bucketlist logo" class="img-logo">
        </div>
        <p class="title" style="text-decoration: underline;">Register an account</p>

        <form class="inputform" action="/register" method="POST">
            @csrf
            <fieldset>

                <div class="input-container" style="display:flex;">
                    <i class="far fa-envelope  icon input-form-icon"></i>
                    <div style="display:grid;">
                        <label>Email</label>
                        <span class="caption">An unique email that bind to this account.</span>
                    </div>
                </div>


                <div class="input-container input-container-center " style="display:flex;">
                    <input name="email" type="email" class="input-form-container required" placeholder="Enter your email" id="emailField" name="new_email">
                </div>

            </fieldset>
            <fieldset>

                <div class="input-container" style="display:flex;">
                    <i class="fa fa-id-card-alt icon icon input-form-icon"></i>
                    <div style="display:grid;">
                        <label>Username</label>
                        <span class="caption">An unique name that bind to this account.</span>
                    </div>
                </div>
                <div class="input-container input-container-center ">
                    <input name="name" type="text" class="input-form-container required" placeholder="Enter your username" id="usernameField" name="new_username">
                </div>
            </fieldset>
            <fieldset>

                <div class="input-container" style="display:flex;">
                    <i class="fa fa-key icon input-form-icon"></i>
                    <div style="display:grid;">
                        <label>Password</label>
                        <span class="caption">Security encryption to protect your account.</span>
                        <span class="suggestHelperText"> ( Minimum 8 characters ) </span>
                    </div>
                </div>
                <div class="input-container input-container-center ">
                    <input name="password" type="password" class="input-form-container required" placeholder="Enter your password" id="passwordField" name="new_password">
                </div>
                <div class="input-container input-container-center">
                    <input name="password_confirmation" type="password" class="input-form-container required" placeholder="Confirm your password" id="reenterpasswordField" name="new_password_reenter">
                </div>


                <p class="errorHelperText" id="passwordHelperText"></p>
            </fieldset>
            @if($errors->any())
            <p class="errorHelperText">{{$errors->first()}}</p>
            @endif

            <fieldset>
                <div class="content" style="flex-Direction:row;">
                    <input type="submit" class="btnPrimary" value="Register" id="register" disabled />
                    <button class="btnCancel" type="button" onclick=" window.location.href= `{{ url('/')}}`"> Cancel </button>
                </div>
            </fieldset>

        </form>
    </div>

    <script>
        // Make sure that all input are not empty , disable register button when necessary
        $(document).on('change keyup', '.required', function(e) {
            let Disabled = true;
            $(".required").each(function() {
                let value = this.value
                password1 = document.getElementById('passwordField').value
                password2 = document.getElementById('reenterpasswordField').value
                if ((value) && (value.trim() != '') && (password1.length >= 8) && (password1 === password2)) {
                    Disabled = false
                } else {
                    Disabled = true
                    return false
                }
            });

            if (Disabled) {
                $('#register').prop("disabled", true);
            } else {
                $('#register').prop("disabled", false);
            }
        })

        $(document).ready(function() {
            $("#passwordField, #reenterpasswordField").keyup(checkPassword);
        });

        // Function to check Whether both passwords is same or not.
        function checkPassword() {
            password1 = document.getElementById('passwordField').value
            password2 = document.getElementById('reenterpasswordField').value
            let passwordHelperText = document.getElementById('passwordHelperText')
            // If Not same return False.
            if (password1 != password2) {
                passwordHelperText.innerHTML = "Password not match"
            } else if (password1.length < 8 || password2.length < 8) {
                passwordHelperText.innerHTML = "Password length must be more than 8 characters"
            } else {
                passwordHelperText.innerHTML = ""
            }
        }
    </script>
</body>


@endsection
