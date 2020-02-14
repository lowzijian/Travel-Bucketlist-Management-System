@extends('layouts.users')

@section('content')

<div class="flex-center full-height col-md-12">

    <div style="margin:15px;width:70%">
        <h1 class="title" style="margin-bottom:0px"> <span class="underline">Edit your travel life experience</span></h1>
    </div>

    <div style="margin:15px;width:70%;">
        <form action="/createtravelBucketItem/{$item -> id}" class="col-md-12" method="PUT" enctype='multipart/form-data'>
            @csrf

            <div class="row withMarginVertical">

                <div class="col-md-8">
                    <label>Title</label>
                    <p class="caption">The title of your journey.</p>
                </div>

                <input type="text" class="input-form-container required col-md-12" placeholder="Title of your journey" id="title" name="title" value="{{$item -> title}}">

            </div>
            <div class="row withMarginVertical">

                <div class="col-md-8">
                    <label>Caption</label>
                    <p class="caption">Meaningful hastags that define your journey.</p>
                </div>

                <input type="text" class="input-form-container required col-md-12" placeholder="#TravelBucketList #MeaningfulTravel" id="captionField" name="caption" value="{{$item -> caption}}">

            </div>
            <div class="row withMarginVertical">

                <div class="col-md-8">
                    <label>Description</label>
                    <p class="caption">Describe your journey.</p>
                </div>

                <textarea class="input-form-container required col-md-12" placeholder="Description of your journey." id="descriptionField" name="description" value="{{$item -> description}}"></textarea>

            </div>
            <div class="row withMarginVertical">

                <div class="col-md-6 withMarginVertical " style="padding-left:0px">
                    <div class="col-md-6">
                        <label> <i class="fa fa-globe-americas"></i> Country</label>
                        <p class="caption">Select a country</p>
                    </div>



                    <select class="input-form-container required" id="countryField" name="country_id" style="max-width: 250px">
                        <option value="" selected disabled hidden>Select a Country</option>
                        @foreach($countries as $country) {
                        <option value={{$country->id}}>{{$country->name}}</option>
                        }
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 withMarginVertical" style="padding-left:0px">
                    <div class="col-md-6">
                        <label> <i class="fa fa-city"></i> City</label>
                        <p class="caption">The destination of your journey</p>
                    </div>

                    <input type="text" class="input-form-container required" placeholder="Enter a city name" id="cityField" name="city" value="{{$item -> city}}">
                </div>


            </div>
            <div class="row withMarginVertical">

                <div class="col-md-4 withMarginVertical" style="padding-left:0px">
                    <div class="col-md-12">
                        <label> <i class="fa fa-plane-departure"></i> Start Date</label>
                        <p class="caption">Departure date</p>
                    </div>

                    <input type="date" class="input-form-container" id="startdateField" name="start_date" value="{{$item -> start_date}}">
                </div>

                <div class="col-md-4 withMarginVertical" style="padding-left:0px">
                    <div class="col-md-12">
                        <label> <i class="fa fa-calendar-alt"></i> End Date</label>
                        <p class="caption">End date</p>
                    </div>

                    <input type="date" class="input-form-container" id="enddateField" name="end_date" value="{{$item -> end_date}}">
                </div>
            </div>
            <div class="row withMarginVertical">

                <div class="col-md-12">
                    <label> <i class="fa fa-images"></i> Image</label>
                    <p class="caption">Upload Images of your journey.</p>
                </div>

                <input type="file" class="col-md-12 btnPrimary" name="photos" accept="image/png, image/jpeg" />
            </div>

            <div class="row withMarginVertical">

                <div class="col-md-12">
                    <label> <i class="fa fa-heart"></i> Overall Experience</label>
                    <p class="caption">Feedback your overall experience on your journey.</p>
                </div>

                <span>
                    <select class="input-form-container" id="emotionField" name="experience" value="{{$item -> experience}}">
                        <option value="" selected disabled hidden>Select an emotion</option>
                        <option value="Excited">Excited</option>
                        <option value="Happy">Happy</option>
                        <option value="Dissapoint">Dissapoint</option>
                        <option value="Sad">Sad</option>
                    </select>

                    <i class="fa fa-meh-blank icon" id="emoticon"></i>
                </span>
            </div>


            <div class="withMarginVertical content">
                <input class="btnPrimary" type="submit" id="Save" value="Put"></button>
                <button class="btnCancel" type="button" onclick=" window.location.href= `{{ url('/home')}}`"> Cancel </button>
            </div>
        </form>
    </div>



</div>
<script>

    $(window).load(function(){
        //info("countryField: ", $item -> country_id);
        //info("emotionField: ", $item -> experience);
        //info("description: ", $item -> description);
    })


    window.onload = () => {
        console.log("countryField: ", $item -> country_id);
        console.log("emotionField: ", $item -> experience);
        console.log("description: ", $item -> description);
        //document.getElementById("countryField").value={{$item -> country_id}};
        //document.getElementById("emotionField").value={{$item -> experience}};
        //document.getElementById("descriptionField").value={{$item -> description}};
    }

    window.addEventListener("load",function(){
        //document.getElementById("countryField").value={{$item -> country_id}};
        //document.getElementById("emotionField").value={{$item -> experience}};
        //document.getElementById("descriptionField").value={{$item -> description}};
    },false);

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


    document.addEventListener('DOMContentLoaded', function() {
        $('#emotionField').on('change', function() {
            let emoticons = document.getElementById('emotionField').value
            console.log(emoticons)
            switch (emoticons) {
                case 'Excited':
                    $('#emoticon').find('[data-fa-i2svg]')
                        .toggleClass('fa-laugh-beam')
                    break;
                case 'Happy':
                    $('#emoticon').find('[data-fa-i2svg]')
                        .toggleClass('fa-smile')
                    break;
                case 'Dissapoint':
                    $('#emoticon').find('[data-fa-i2svg]')
                        .toggleClass('fa-frown')
                    break;
                case 'Sad':
                    $('#emoticon').find('[data-fa-i2svg]')
                        .toggleClass('fa-sad-tear')
                    break;
            }
        });
    });
</script>


@endsection
