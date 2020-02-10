@extends('layouts.users')

@section('content')


<div class="col-md-12 flex-center">

    <!-- header welcome back message -->
    <div class="col-md-12 row header">
        <div class="col-md-8">
            <div style="padding-left: 25px;">
                <h1 class="title row"> Welcome back </h1>
                <h3 class="row caption2"> our fellow travel buddy </h3>
                <h3 class="displayName row" style="font-size: 3.5rem"> <span class="underline">{{$user->name}} </span></h3>
            </div>
        </div>

        <div class="col-md-4">
            <img src="/asset/img/travel.svg" alt="Travel Bucketlist" class="img-header" />
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


    <div class="flex-center col-md-12 withMarginVertical">

        <h1 class="title">Explore Your Stories</h1>
        <div class="withMarginVertical">
            <span class="totalItem row">Total travel bucketlist's items : <span class="num">{{count($items)}}</span></span>
            <span class="caption row">Last updated at {{$user->updated_at}}</span>
        </div>


        @if (count($items) >> 0)
        <div class="col-md-12" style="padding: 2.5rem 2.5rem 3rem 2.5rem;">
            <h2 class="col-sm-2" style="text-align:center;padding-top:12px;"> Filter By</h2>
            <select class="filter-form-container col-sm-3" id="filter_country" style="margin:5px">
                <option value="default" selected disabled hidden>Select a Country</option>
                @foreach($countries as $country) {
                    <option value={{$country->id}}>{{$country->name}}</option>
                }
                @endforeach
            </select>

            <select class="filter-form-container col-sm-3" id="filter_status" style="margin:5px">
                <option value="default" selected disabled hidden>Select a status</option>
                <option value="visited">Visited</option>
                <option value="notvisited">Not visited</option>
            </select>

            <button type="button" class="btnPrimary col-sm-2" onclick="filterSelection()" style="margin:5px"> <i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
            <button type="reset" class="btnCancel col-sm-2" onclick="clearSelection()" style="margin:5px">Clear</button>
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
            <div style="margin:15px;" class="flex-center" id="filter_country_info">
                @if ($selected_country)
                <div class="row bucketListCard col-md-12 withMarginVertical">
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{$selected_country->flag}}" alt="FlagOfTheCountry" style=" object-fit: cover; height: 160px;">
                    </div>
                    <div class="col-md-8 column">
                        <div class="row">
                            <p class="locationTitle col-md-3">{{$selected_country->name}}</p>
                        </div>
                        <div class="row">
                            <p class="locationRegion col-md-3">{{$selected_country->region}}</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-landmark"></i> Captital City</p>
                            <p class="col-md-3">{{$selected_country->capital}}</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-users"></i> Population</p>
                            <p class="col-md-3">{{$selected_country->population}}</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-language"></i> Languages</p>
                            <p class="col-md-3">{{$selected_country->languages}}</p>
                        </div>
                        <div class="row">
                            <p class="locationLabel col-md-3"> <i class="fa fa-money-bill-wave"></i> Currencies</p>
                            <p class="col-md-3">{{$selected_country->currency}} <span class="caption">(؋)</span></p>
                        </div>
                    </div>
                </div>
                @endif
            </div>


        </div>


        @else
        <div style="margin:15px;" class="row flex-center">
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

        window.onload = () => {
            const href = window.location.href
            const params = href.split('?')[1]
            const { 0: country_id, 1: status } = params.split('&')

            if (country_id) {
                $('#filter_country').val(country_id.split('=')[1])
            }

            if (status) {
                $('#filter_status').val(status.split('=')[1])
            }

            console.log(country_id)
            console.log(status)
        }

        function filterSelection() {
            const country_id = $('#filter_country').children('option:selected').val()
            const status = $('#filter_status').children('option:selected').val()

            if (country_id == "default" && status == "default") {
                window.location.href = '/home';
            } else {
                if (country_id == "default" && status != "default")
                    window.location.href = `/home?status=${status}`;
                else if (country_id != "default" && status == "default")
                    window.location.href = `/home?country_id=${country_id}`;
                else
                    window.location.href = `/home?country_id=${country_id}&status=${status}`;
            }
        }

        function clearSelection() {
            window.location.href = '/home';
        }
    </script>
    @endsection
