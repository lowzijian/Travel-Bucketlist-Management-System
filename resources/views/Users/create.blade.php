<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Bucketlist Create</title>

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
        <a class="navigationItem " href="{{ url('/home')}}"><i class="fa fa-home"></i> Home</a>
        <a class="navigationItem active" href="{{ url('/create')}}"><i class="fa fa-plus-square"></i> Create</a>
        <a class="navigationItem" href="{{ url('/')}}"><i class="fa fa-sign-out-alt"></i></a>
    </nav>
</header>

<body style="min-height:80%">
    <div class="flex-center full-height">

        <div style="margin:15px;width:70%">
            <p class="title" style="margin-bottom:0px">Create a new travel life experience</p>
        </div>

        <div style="margin:15px;width:70%;">
            <form action="" class="col-md-12">
                <div class="row withMarginVertical">

                    <div class="col-md-8">
                        <label>Title</label>
                        <p class="caption">The title of your journey.</p>
                    </div>

                    <input type="text" class="input-form-container required col-md-12" placeholder="Title of your journey" id="titleField" name="new_title">

                </div>
                <div class="row withMarginVertical">

                    <div class="col-md-8">
                        <label>Caption</label>
                        <p class="caption">Meaningful hastags that define your journey.</p>
                    </div>

                    <input type="text" class="input-form-container required col-md-12" placeholder="#TravelBucketList #MeaningfulTravel" id="captionField" name="new_caption">

                </div>
                <div class="row withMarginVertical">

                    <div class="col-md-8">
                        <label>Description</label>
                        <p class="caption">Describe your journey.</p>
                    </div>

                    <textarea class="input-form-container required col-md-12" placeholder="Description of your journey." id="descriptionField" name="new_decription"></textarea>

                </div>
                <div class="row withMarginVertical">

                    <div class="col-md-3 withMarginVertical">
                        <label> <i class="fa fa-globe-americas"></i> Nation</label>
                        <p class="caption">Select a Country</p>


                        <select class="input-form-container required" id="countryField" name="new_country">
                            <option value="" selected disabled hidden>Select a Country</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Vietnam">Vietnam</option>
                        </select>
                    </div>

                    <div class="col-md-3 withMarginVertical">
                        <label> <i class="fa fa-city"></i> City</label>
                        <p class="caption">Select a City</p>


                        <select class="input-form-container required" id="cityField" name="new_city">
                            <option value="" selected disabled hidden>Select a City</option>
                            <option value="Bangkok">Bangkok</option>
                            <option value="ChiangMai">Chiang Mai</option>
                            <option value="HatYai">Hat Yai</option>
                        </select>
                    </div>

                    <div class="col-md-3 withMarginVertical">
                        <label> <i class="fa fa-plane-departure"></i> Start Date</label>
                        <p class="caption">Departure date</p>

                        <input type="date" class="input-form-container required" id="startdateField" name="new_startdate">
                    </div>

                    <div class="col-md-3 withMarginVertical">
                        <label> <i class="fa fa-calendar-alt"></i> End Date</label>
                        <p class="caption">End date</p>

                        <input type="date" class="input-form-container required" id="enddateField" name="new_enddate">
                    </div>
                </div>



                <div class="content withMarginVertical" style="flex-Direction:row; margin-Top:30px">
                    <button class="btnPrimary" type="submit" id="Create" name="Create" disabled>Create</button>
                    <button class="btnCancel" type="button" onclick=" window.location.href= `{{ url('/home')}}`"> Cancel </button>
                </div>
            </form>
        </div>



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
                $('#Create').prop("disabled", true);
            } else {
                $('#Create').prop("disabled", false);
            }
        })
    </script>
</body>

<footer>
    <p class="footerText">Travel Bucketlist management system &copy; Created by Chin Kai Xiang , Tan Chee Kuan , Low Zi Jian.</p>
</footer>

</html>
