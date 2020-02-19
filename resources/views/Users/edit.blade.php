@extends('layouts.users')

@section('content')

<div class="flex-center full-height col-md-12">

    <div style="margin:15px;width:70%">
        <h1 class="title" style="margin-bottom:0px"> <span class="underline">Edit your travel life experience</span></h1>
    </div>

    <div style="margin:15px;width:70%;">
        <form action="/travelBucketItem/{{$item -> id}}" class="col-md-12" method="POST" enctype='multipart/form-data'>
            @csrf
            <input name="_method" type="hidden" value="PUT">
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

                <textarea class="input-form-container required col-md-12" placeholder="Description of your journey." id="descriptionField" name="description" value="{{$item->description}}">{{$item->description}}</textarea>

            </div>
            <div class="row withMarginVertical">

                <div class="col-md-6 withMarginVertical " style="padding-left:0px">
                    <div class="col-md-6">
                        <label> <i class="fa fa-globe-americas"></i> Country</label>
                        <p class="caption">Select a country</p>
                    </div>


                    <div class="row col-md">
                        <select class="input-form-container required" id="countryField" name="country_id" style="max-width: 250px">
                            <option value="noCountry" disabled hidden>Select a Country</option>
                            <option selected value={{$item->country_id}}>{{$selectedCountry[0]->name}}</option>
                            @foreach($countries as $country) {
                            <option value={{$country->id}}>{{$country->name}}</option>
                            }
                            @endforeach
                        </select>
                        <button class="btnCancel" type="button" style="margin-left:5px" onclick="clearFormInput('country',event)" id="clearCountry" hidden=true> Clear </button>
                    </div>
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
                    <input type="date" class="input-form-container" id="startdateField" name="start_date" value="{{substr($item -> start_date, 0, 10)}}">
                </div>

                <div class="col-md-4 withMarginVertical" style="padding-left:0px">
                    <div class="col-md-12">
                        <label> <i class="fa fa-calendar-alt"></i> End Date</label>
                        <p class="caption">End date</p>
                    </div>

                    <input type="date" class="input-form-container" id="enddateField" name="end_date" value="{{substr($item -> end_date, 0, 10)}}">
                </div>
            </div>
            <div class="row withMarginVertical">

                <div class="col-md-12">
                    <label> <i class="fa fa-images"></i> Image</label>
                    <p class="caption">Upload Images of your journey.</p>
                </div>

                <div class="row col-md">
                    <input type="file" class="col-md-8 btnPrimary" name="photos" accept="image/png, image/jpeg" id="photoField" />
                    <button class="btnCancel" type="button" style="margin-left:5px" onclick="clearFormInput('photo',event)" id="clearPhoto" hidden=true> Clear </button>
                </div>
            </div>

            <div class="row withMarginVertical">

                <div class="col-md-12">
                    <label> <i class="fa fa-heart"></i> Overall Experience</label>
                    <p class="caption">Feedback your overall experience on your journey.</p>
                </div>

                <div class="row col-md">
                    <span>
                        <select class="input-form-container" id="emotionField" name="experience">
                            <option value="Meh" disabled hidden>Select an emotion</option>
                            <option value="{{$item -> experience}}" selected>{{$item -> experience}}</option>
                            <option value="Excited">Excited</option>
                            <option value="Happy">Happy</option>
                            <option value="Dissapoint">Dissapoint</option>
                            <option value="Sad">Sad</option>
                        </select>

                        <i class="fa fa-meh-blank icon" id="emoticon"></i>
                    </span>
                    <button class="btnCancel" type="button" style="margin-left:5px" onclick="clearFormInput('emoticon',event)" id="clearEmoticon" hidden=true> Clear </button>

                </div>
            </div>


            <div class="withMarginVertical content">
                <input class="btnPrimary" type="submit" id="Save" value="Save">
                <button class="btnCancel" type="button" onclick=" window.location.href= `{{ url('/home')}}`"> Cancel </button>
            </div>
        </form>
    </div>



</div>
<script>
    function checkClearableFormInput() {
        let countryField = document.getElementById('countryField')
        let emotionField = document.getElementById('emotionField')

        if (!countryField.value) {
            countryField.value = "noCountry"
        } else {
            let clearCountryBtn = document.getElementById('clearCountry')
            clearCountryBtn.hidden = false

        }

        if (!emotionField.value) {
            emotionField.value = "Meh"
        } else {
            let clearEmoticonBtn = document.getElementById('clearEmoticon')
            clearEmoticonBtn.hidden = false
        }

    }

    function clearFormInput(field, event) {
        event.srcElement.hidden = true
        switch (field) {
            case 'country': {
                let fieldBox = document.getElementById('countryField')
                fieldBox.value = "noCountry"
            }
            break;
        case 'photo': {
            let fieldBox = document.getElementById('photoField')
            fieldBox.value = null
        }
        break;
        case 'emoticon': {
            let fieldBox = document.getElementById('emotionField')
            fieldBox.value = "Meh"
            experienceChange()

        }
        break;


        }
    }


    document.addEventListener('DOMContentLoaded', function() {
        $('#emotionField').on('change', function() {
            let clearEmoticonBtn = document.getElementById('clearEmoticon')
            clearEmoticonBtn.hidden = false
            experienceChange()
        });

        $('#countryField').on('change', function() {
            let clearCountryBtn = document.getElementById('clearCountry')
            clearCountryBtn.hidden = false
        });

        $('#photoField').on('change', function() {
            let clearPhotoBtn = document.getElementById('clearPhoto')
            clearPhotoBtn.hidden = false
        });
    });

    window.onload = () => {
        experienceChange()
        checkClearableFormInput()
    }

    document.addEventListener('DOMContentLoaded', function() {
        $('#emotionField').on('change', function() {
            experienceChange()
        });
    });

    function experienceChange() {
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
            default:
                $('#emoticon').find('[data-fa-i2svg]')
                    .toggleClass('fa-meh-blank')
                break;
        }
    }
</script>


@endsection
