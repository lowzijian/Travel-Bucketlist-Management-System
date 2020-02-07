@extends('layouts.users')

@section('content')

    <div class="flex-center full-height col-md-12">

        <div style="margin:15px;width:70%">
            <p class="title" style="margin-bottom:0px">Your Travel Bucketlist Countries</p>
            <p>Total bucket list<i class="fa fa-flag icon"></i> : <span class="num">2</span></p>
            <p class="caption">Last updated at 30-1-2020</p>
        </div>

        <div style="margin:15px;width:70%;">
            <div class="row bucketListCard col-md-12 withMarginVertical">
                <div class="row">
                    <img class="col-md-3" src="https://restcountries.eu/data/afg.svg" alt="FlagOfTheCountry" style=" object-fit: cover; height: 100px;">
                    <div class="col-md-9 column">
                        <p class="locationTitle">Afghanistan</p>
                        <p class="locationRegion">Asia</p>
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

            <div class="row bucketListCard col-md-12 withMarginVertical">
                <div class="row">
                    <img class="col-md-3" src="https://restcountries.eu/data/afg.svg" alt="FlagOfTheCountry" style=" object-fit: cover; height: 100px;">
                    <div class="col-md-9 column">
                        <p class="locationTitle">Afghanistan</p>
                        <p class="locationRegion">Asia</p>
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

            <div class="withMarginVertical col-md-12 row" style="justify-content:flex-end;">
                <button class="btnPrimary" style="width:auto;" type="submit" id="Add" name="Add">Add a travel bucketlist country</button>
            </div>
        </div>

    </div>


@endsection

