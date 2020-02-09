@extends('layouts.users')

@section('content')


<div class="col-md-12">

    <!-- header welcome back message -->
    <div class="flex-center  col-md-12 withMarginVertical">

        <div class="col-md-12 row header">
            <div class="container">
                <div class="col-md-8">
                    <div>
                        <h1 class="title row"> Welcome back </h1>
                        <h3 class="row caption2"> our fellow travel buddy </h3>
                        <h3 class="displayName row" style="font-size: 3.5rem"> <span class="underline">{{$user->name}} </span></h3>
                    </div>
                </div>

                <div class="col-md-4">
                    <img src="/asset/img/travel.svg" alt="Travel Bucketlist" class="img-header" />
                </div>

            </div>

        </div>
    </div>

    <!-- weather widget -->
    <div class="col-md-12 withMarginVertical">

        <a class="weatherwidget-io" href="https://forecast7.com/en/3d11101d73/cheras/" data-label_1="CHERAS" data-label_2="WEATHER" data-icons="Climacons Animated" data-mode="Current" data-theme="weather_one">CHERAS WEATHER</a>
        <script>
            ! function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://weatherwidget.io/js/widget.min.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, 'script', 'weatherwidget-io-js');
        </script>

    </div>


    <div class="flex-center  col-md-12 withMarginVertical">

        <h1 class="title row">Explore Your Stories</h1>
        <div class="withMarginVertical">
            <span class="totalItem row">Total travel bucketlist's items : <span class="num">{{count($items)}}</span></span>
            <span class="caption row">Last updated at {{$user->updated_at}}</span>
        </div>


        @if (count($items) >> 0)

        <div class="col-md-12 row" style="justify-content: center;">

            <h2 class="col-sm-2" style="text-align: center;padding-top:12px;"> Filter By</h2>
            <select class="filter-form-container col-sm-3" id="filter_country" style="margin:5px">
                <option value="default" selected disabled hidden>Select a Country</option>
                @foreach($countries as $country) {
                <option value={{$country->id}}>{{$country->name}}</option>
                }
                @endforeach
            </select>

            <div class="displayFilteredCountry col-sm-3" style="display: none">
                <span class="filteredCountryValue"></span>
                <span class="filteredCountryClear"><i class="fas fa-times clearBtn"></i></span>
            </div>


            <select class="filter-form-container col-sm-3" id="filter_status" style="margin:5px">
                <option value="default" selected disabled hidden>Select a status</option>
                <option value="visited">Visited</option>
                <option value="notvisited">Not visited</option>
            </select>

            <div class="displayFilteredStatus col-sm-3" style="display: none">
                <span class="filteredStatusValue"></span>
                <span class="filteredStatusClear"><i class="fas fa-times clearBtn"></i></span>
            </div>

        </div>



        <div class="content" style="margin:15px;width:100%;">
            <section id="gallery">
                <div>
                    <div id="image-gallery">
                        <div class="row">
                            @foreach($items as $item)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                <div class="img-wrapper" onclick=" window.location.href= `{{ url('/show')}}`">
                                    <a href={{"/show/" . $item->id}}><img src="/{{(json_decode($item->photos))[0]}}" class="img-responsive"></a>
                                    <div class="img-overlay">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="img-title-caption">
                                    <p class="travelLocation"><i class="fa fa-map-marker-alt"></i> {{$item->city}}, {{$item->travel_bucket_country->name}}</p>
                                    <p class="travelTitle">{{$item->title}}</p>
                                    <a class="btnOutlined" style="float:right;" href={{"/show/" . $item->id}}>Read More</a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div><!-- End image gallery -->
                </div><!-- End container -->

            </section>
            <div style="margin:15px;" class="flex-center" id="filter_country_info"></div>


        </div>


        @else
        <div style="margin:15px;width:75%" class="col-md-12 row flex-center">
            <img src="/asset/img/emptylist.svg" alt="Empty Travel Bucketlist" class="img-EmptyList" />
            <div class="withMarginVertical" style="text-align: center;">
                <h1>Empty Travel Bucket. </h1>
                <p>Start to create a new travel bucket list item now!</p>
            </div>
        </div>

        @endif

    </div>

    <script>
        // Gallery image hover
        $(".img-wrapper").hover(
            function() {
                $(this).find(".img-overlay").animate({
                    opacity: 1
                }, 600);
            },
            function() {
                $(this).find(".img-overlay").animate({
                    opacity: 0
                }, 600);
            }
        );

        $('#filter_country').on('change', function() {
            $(this).add('.displayFilteredCountry').toggle();
            var countries = <?php echo json_encode($countries); ?>;
            $('.filteredCountryValue', '.displayFilteredCountry').html(countries[this.value].name);
        });

        $('.filteredCountryClear', '.displayFilteredCountry').click(function() {
            $('#filter_country').val('default').fadeIn();
            $('.displayFilteredCountry').toggle();
            $('.filteredCountryValue', '.displayFilteredCountry').html('');
        });


        $('#filter_status').on('change', function() {
            $(this).add('.displayFilteredStatus').toggle();
            $('.filteredStatusValue', '.displayFilteredStatus').html(this.value);
        });

        $('.filteredStatusClear', '.displayFilteredStatus').click(function() {
            $('#filter_status').val('default').fadeIn();
            $('.displayFilteredStatus').toggle();
            $('.filteredStatusValue', '.displayFilteredStatus').html('');
        });

        // Filter selection
        function filterSelection() {
            const selected_country_field = document.getElementById('filter_country')
            const selected_country = selected_country_field.options[selected_country_field.selectedIndex].value
            const selected_status_field = document.getElementById('filter_status')
            const selected_status = selected_status_field.options[selected_status_field.selectedIndex].value
            const country_info = document.getElementById('filter_country_info')
            console.log(selected_country, 'selected_country')
            console.log(selected_status, 'selected_status')

            if (selected_country != "default") {
                country_info.innerHTML = `
                <div class="row bucketListCard col-md-12 withMarginVertical">
                <div class="row">
                    <img class="col-md-3" src="https://restcountries.eu/data/afg.svg" alt="FlagOfTheCountry" style=" object-fit: cover; height: 100px;">
                    <div class="col-md-9 column">
                        <div class="row">
                            <p class="locationTitle col-md-3">Afghanistan</p>
                        </div>
                        <div class="row">
                            <p class="locationRegion col-md-3">Asia</p>
                        </div>
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

                `

            } else {
                country_info.innerHTML = ``
            }

        }

        function clearSelection() {
            $('select').prop('selectedIndex', 0);
            const country_info = document.getElementById('filter_country_info')
            country_info.innerHTML = ``

        }
    </script>


</div>
@endsection
