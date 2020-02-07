@extends('layouts.users')

@section('content')

<div class="row col-md-12">

    <div class="col-md-2" style="margin:10px;">
        <span class="author row"><i class="fa fa-at" style="padding-right:5px"></i>Chin Kai Xiang</span>

        <span class="caption row">Last edited at 1 January 2020</span>
        <div class="row divider"></div>
    </div>

    <div class="col-md-9" style="margin:10px;margin-top: 30px;">
        <div class="row">
            <p class="title col-md-12">Travel to Bangkok</p>
            <p class="travelLocation col-md-12" style="font-size:18px;"><i class="fa fa-map-marker-alt"></i> Bangkok , Thailand</p>
            <p class="hashtags col-md-12">#MeaningfulLife #Thailand</p>
        </div>

        <div class="row">
            <p class="description col-md-12">I have really enjoyed being apart of this tour group. The tour gave me the chance to experience a good variety of things over the week. It was great to see Bangkok (temples, nightlife, markets and the boat ride). It was then lovely to relax in Khao Sok, Bottle Beach and during the river cruise in Koh Pha-ngan on the last day. If I had travelled alone I would not of had the same experience. It was great to have all the activities organised so I could just turn up and enjoy. I was very lucky also to have 4 other solo female travellers in my group as I had worried they would be all couples or groups of friends. Arthur has been a great tour guide over the week. He helped with any questions or problems I had and he was always around if we needed him. He was also always there to take photos and send them to us. Arthur is a lot of fun and was always up for a laugh, including everyone, and making sure we were having a good time. The transport was great also, a taxi or minibus was always waiting for us when we finished an activity or wanted to go somewhere. The accommodation was generally well located (with walking distance to busy areas). I felt it could have been a bit cleaner (ants in my bedroom). However, when I told Arthur about this he immediately organised fo rme to change rooms which made me much happier. Overall I really enjoyed the whole experience and would recommend this trip to a friend. I look forward to travelling on another tour with TruTravels in the future.</p>
        </div>

        <div class="row" style="align-items:center;justify-content:center;">
            <img src="https://unsplash.it/800" class="img-responsive" style="object-fit:fill;height:350px;width:500px">
        </div>

        <div class="row divider"></div>

        <div class="row">
            <div class="col-md-12 row">
                <p class="title col-sm-4">Travel Duration :</p>
                <span style="display:grid; " class="col-sm-5">
                    <span class="title" style="color:#BDB4D9">15 days</span>
                    <span class="caption">Start from 11/7/2019 to 12/7/2019</span>
                </span>
            </div>

            <div class="col-md-12 row withMarginVertical">
                <p class="title col-sm-4">Overall Experience :</p>
                <span class="title col-sm-5" style="color:#BDB4D9">Happy</span>
            </div>
        </div>

        <div class="withMarginVertical content" style="float:right;">
            <button class="btnPrimary" type="submit" id="Edit" name="Edit">Edit <i class="fa fa-edit"></i> </button>
            <button class="btnWarning" type="button" onclick="deleteContent()"> <i class="fa fa-trash-alt"></i> </button>
        </div>
    </div>

</div>

<script>
    function deleteContent() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you really want to delete this memorable travel record? This process cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#C1C1C1',
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    allowOutsideClick: false,
                    title: 'Deleted!',
                    text: 'This record has been deleted.',
                    icon: 'success',
                }).then((result) => {
                    if (result.value) {
                        window.location.href = `{{ url('/home')}}`;
                    }
                })
            }
        })
    }
</script>



@endsection
