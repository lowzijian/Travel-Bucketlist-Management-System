<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Bucketlist - Register an account</title>
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



<body>
    <div class="flex-center full-height">
        <div class="content" style="margin-Bottom:0px">
            <img src="/asset/img/travel_bucketlist_logo.png" alt="Travel Bucketlist logo" style="width:500px;height:300px;min-width:200px">
        </div>
        <p class="title" style="text-decoration: underline;">Register an account</p>

        <form class="inputform" action="">
            <fieldset>

                <div class="input-container" style="display:flex;">
                    <i class="fa fa-user icon icon input-form-icon"></i>
                    <div style="display:grid;">
                        <label>Username</label>
                        <span class="caption">An unique name to be used as login id.</span>
                    </div>
                </div>


                <div class="input-container input-container-center " style="display:flex;">
                    <input type="text" class="input-form-container required" placeholder="Enter your username" id="usernameField" name="new_username">
                </div>

            </fieldset>
            <fieldset>

                <div class="input-container" style="display:flex;">
                    <i class="fa fa-id-card-alt icon icon input-form-icon"></i>
                    <div style="display:grid;">
                        <label>Display Name</label>
                        <span class="caption">An unique name to be shown after login.</span>
                    </div>
                </div>
                <div class="input-container input-container-center ">
                    <input type="text" class="input-form-container required" placeholder="Enter your display name" id="displaynameField" name="new_displayname">
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
                    <input type="password" class="input-form-container required" placeholder="Enter your password" id="passwordField" name="new_password">
                </div>
                <div class="input-container input-container-center">
                    <input type="password" class="input-form-container required" placeholder="Confirm your password" id="reenterpasswordField" name="new_password_reenter">
                </div>


                <p class="errorHelperText" id="passwordHelperText"></p>
            </fieldset>

            <fieldset>
                <div class="content" style="flex-Direction:row;">
                    <button class="btnPrimary" type="submit" id="register" name="register" disabled>Register</button>
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
                if ((value) && (value.trim() != '')) {
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

<footer>
    <p class="footerText">Travel Bucketlist management system &copy; Created by Chin Kai Xiang , Tan Chee Kuan , Low Zi Jian.</p>
</footer>

</html>
