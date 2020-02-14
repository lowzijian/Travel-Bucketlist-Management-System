@extends('layouts.users')

@section('content')

<div class="row col-md-12">

    <div class="col-md-2" style="margin:10px;">
        <span class="author row"><i class="fa fa-at" style="padding-right:5px"></i>{{$user -> name}}</span>

        <span class="caption row">Last edited at {{ date("j F Y H:i:s", strtotime($travelBucketItem[0] -> updated_at))}}</span>
        <div class="row divider"></div>
    </div>

    <div class="col-md-9" style="margin:10px;margin-top: 30px;">
        <div class="row">
            <h1 class="title col-md-12">{{$travelBucketItem[0] -> title}}</h1>
            <p class="travelLocation col-md-12" style="font-size:18px;"><i class="fa fa-map-marker-alt"></i> {{$travelBucketItem[0] -> city}} , {{$travelBucketItem[0] -> countryName}}</p>
            <p class="hashtags col-md-12">{{$travelBucketItem[0] -> caption}}</p>
        </div>

        <div class="row withMarginVertical">
            <p class="description col-md-12">{{$travelBucketItem[0] -> description}}</p>
        </div>

        <div class="row withMarginVertical" style="align-items:center;justify-content:center;">
            <img src="/{{(json_decode($travelBucketItem[0]->photos))[0]}}" class="img-responsive" style="object-fit: fill;
                    max-height: 350px;
                    max-width: 500px;
                    min-width: 150px;
                    min-height: 200px;">
        </div>


        <div class="row divider withMarginVertical"></div>

        <div class="row">
            <div class="col-md-12 row">
                <h3 class="title col-sm-4">Travel Duration :</h3>
                <span style="display:grid; " class="col-sm-5">
                    <span class="title" style="color:#BDB4D9">{{(strtotime($travelBucketItem[0] -> end_date)-strtotime($travelBucketItem[0] -> start_date))/86400}} days</span>
                    <span class="caption">Start from {{date("d/m/Y", strtotime($travelBucketItem[0] -> start_date))}} to {{date("d/m/Y", strtotime($travelBucketItem[0] -> end_date))}}</span>
                </span>
            </div>

            <div class="col-md-12 row withMarginVertical">
                <h3 class="title col-sm-4">Overall Experience :</h3>
                <span class="title col-sm-5" style="color:#BDB4D9">Happy</span>
            </div>
        </div>

        <div class="withMarginVertical content" style="float:right;">
        
            <a href={{"/travelBucketItem/edit/" . $travelBucketItem[0]->id}}><button class="btnPrimary" type="submit" id="Edit" name="Edit">Edit <i class="fa fa-edit"></i> </button></a>
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
