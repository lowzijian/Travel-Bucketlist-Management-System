@extends('layouts.app')

@section('content')
<header>
    <div class="container">
        <img src="/asset/img/travel_bucketlist_thumbnail.png" alt="Travel Bucketlist thumbnail">
        <h1 style="color:White;">The Travel Bucketlist</h1>

    </div>

    <nav class="container" style="padding-Bottom:0px">
        <a class="navigationItem active" href="{{ url('/home')}}"><i class="fa fa-home"></i> Home</a>
        <a class="navigationItem " href="{{ url('/create')}}"><i class="fa fa-plus-square"></i> Create</a>
        <a class="navigationItem" href="{{ url('/countries')}}"><i class="fa fa-compass"></i> Countries</a>
        <a class="navigationItem" href="{{ url('/')}}"><i class="fa fa-sign-out-alt"></i></a>
    </nav>
</header>

<body style="min-height:80%">
    <div class="flex-center full-height col-md-12">

        <div style="margin:15px;width:75%" class="col-md-12">
            <p class="title" style="margin-bottom:0px">Welcome back <span class="displayName">Chin Kai Xiang</span></p>
            <p>Total visited<i class="fa fa-city icon"></i> : <span class="num">25</span></p>
            <p class="caption">Last updated at 30-1-2020</p>
        </div>

        <div style="margin:15px;width:80%" class="col-md-12 row">
            <select class="input-form-container col-sm-3" id="filter_country" style="margin:5px">
                <option value="default" selected disabled hidden>Select a Country</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Thailand">Thailand</option>
                <option value="Singapore">Singapore</option>
                <option value="Vietnam">Vietnam</option>
            </select>


            <select class="input-form-container col-sm-3" id="filter_status" style="margin:5px">
                <option value="default" selected disabled hidden>Select a status</option>
                <option value="visited">Visited</option>
                <option value="notvisited">Not visited</option>
            </select>


            <button type="button" class="btnPrimary col-sm-2" onclick="filterSelection()" style="margin:5px"> <i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
            <button type="reset" class="btnCancel col-sm-2" onclick="clearSelection()" style="margin:5px">Clear</button>

        </div>



        <div class="content" style="margin:15px;width:80%;overflow:scroll;">
            <section id="gallery">
                <div>
                    <div id="image-gallery">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                <div class="img-wrapper" onclick=" window.location.href= `{{ url('/show')}}`">
                                    <a href="https://unsplash.it/800"><img src="https://unsplash.it/800" class="img-responsive"></a>
                                    <div class="img-overlay">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="img-title-caption">
                                    <p class="travelLocation"><i class="fa fa-map-marker-alt"></i> Bangkok , Thailand</p>
                                    <p class="travelTitle">Travel to Bangkok</p>
                                    <button class="btnOutlined" style="float:right;" onclick=" window.location.href= `{{ url('/show')}}`">Read More</button>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                <div class="img-wrapper" onclick=" window.location.href= `{{ url('/show')}}`">
                                    <a href="https://unsplash.it/700"><img src="https://unsplash.it/700" class="img-responsive"></a>
                                    <div class="img-overlay">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="img-title-caption">
                                    <p class="travelLocation"><i class="fa fa-map-marker-alt"></i> Bangkok , Thailand</p>
                                    <p class="travelTitle">Travel to Bangkok</p>
                                    <button class="btnOutlined" style="float:right;" onclick=" window.location.href= `{{ url('/show')}}`">Read More</button>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                <div class="img-wrapper" onclick=" window.location.href= `{{ url('/show')}}`">
                                    <a href="https://unsplash.it/600"><img src="https://unsplash.it/600" class="img-responsive"></a>
                                    <div class="img-overlay">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="img-title-caption">
                                    <p class="travelLocation"><i class="fa fa-map-marker-alt"></i> Bangkok , Thailand</p>
                                    <p class="travelTitle">Travel to Bangkok</p>
                                    <button class="btnOutlined" style="float:right;" onclick=" window.location.href= `{{ url('/show')}}`">Read More</button>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                <div class="img-wrapper" onclick=" window.location.href= `{{ url('/show')}}`">
                                    <a href="https://unsplash.it/500"><img src="https://unsplash.it/500" class="img-responsive"></a>
                                    <div class="img-overlay">
                                        <i class="fa fa-plane" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="img-title-caption">
                                    <p class="travelLocation"><i class="fa fa-map-marker-alt"></i> Bangkok , Thailand</p>
                                    <p class="travelTitle">Travel to Bangkok</p>
                                    <button class="btnOutlined" style="float:right;" onclick=" window.location.href= `{{ url('/show')}}`">Read More</button>
                                </div>
                            </div>
                        </div><!-- End row -->
                    </div><!-- End image gallery -->
                </div><!-- End container -->

            </section>
            <div style="margin:15px;" class="flex-center" id="filter_country_info">

            </div>


        </div>

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
</body>
@endsection
