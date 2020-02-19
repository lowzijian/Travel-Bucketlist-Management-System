@extends('layouts.users')

@section('content')

<div class="row col-md-12">

    <div class="col-md-2" style="margin:10px;">
        <span class="author row"><i class="fa fa-at" style="padding-right:5px"></i>{{$user -> name}}</span>

        <span class="caption row">Last edited at {{ date("j F Y H:i:s", strtotime($travelBucketItem -> updated_at))}}</span>
        <div class="row divider"></div>
    </div>

    <div class="col-md-9" style="margin:10px;margin-top: 30px;">
        <div class="row">
            <h1 class="title col-md-12">{{$travelBucketItem -> title}}</h1>
            <p class="travelLocation col-md-12" style="font-size:18px;"><i class="fa fa-map-marker-alt"></i> {{$travelBucketItem -> city}} , {{$travelBucketItem -> travel_bucket_country->name}}</p>
            <p class="hashtags col-md-12">{{$travelBucketItem -> caption}}</p>
        </div>

        <div class="row withMarginVertical">
            <p class="description col-md-12">{{$travelBucketItem -> description}}</p>
        </div>

        <div class="row withMarginVertical" style="align-items:center;justify-content:center;">
            <img src="/{{(json_decode($travelBucketItem->photos))[0]}}" class="img-responsive" style="object-fit: fill;
                    max-height: 350px;
                    max-width: 500px;
                    min-width: 150px;
                    min-height: 200px;">
        </div>


        <div class="row divider withMarginVertical"></div>

        <div class="row">
            <div class="col-md-12 row">
                <h3 class="title col-sm-4">Travel Duration :</h3>
                @if ($travelBucketItem -> start_date && $travelBucketItem -> end_date)
                <span style="display:grid; " class="col-sm-5">
                    <h3 class="title" style="color:#BDB4D9">{{(strtotime($travelBucketItem -> end_date)-strtotime($travelBucketItem -> start_date))/86400}} days</h3>
                    <span class="caption">Start from {{date("d/m/Y", strtotime($travelBucketItem -> start_date))}} to {{date("d/m/Y", strtotime($travelBucketItem -> end_date))}}</span>
                </span>
                @else
                <span style="display:grid; " class="col-sm-5">
                    <h3 class="title" style="color:#BDB4D9">None</h3>
                    <span class="caption">Plan a date to travel</span>
                </span>
                @endif
            </div>

            <div class="col-md-12 row withMarginVertical">
                <h3 class="title col-sm-4">Overall Experience :</h3>
                @if ($travelBucketItem -> experience)
                <h3 class="title col-sm-5" style="color:#BDB4D9">{{$travelBucketItem -> experience}}</h3>
                @else
                <h3 class="title col-sm-5" style="color:#BDB4D9">None</h3>
                @endif
            </div>
        </div>

        <div class="withMarginVertical content" style="float:right;">
            <a href={{"/travelBucketItem/edit/" . $travelBucketItem->id}}><button class="btnPrimary" type="submit" id="Edit" name="Edit">Edit <i class="fa fa-edit"></i> </button></a>
            <button class="btnWarning" type="button" onclick="deleteContent()"> <i class="fa fa-trash-alt"></i> </button>
            <form name="deleteForm" method="POST" enctype='multipart/form-data ' action={{"/show/". $travelBucketItem->id}}>
                @csrf
            </form>
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
                confirmDelete()
            }
        })

    }

    function confirmDelete() {
        var deleteForm = document.getElementsByName('deleteForm');
        deleteForm[0].submit(); // Form submission
    }
</script>



@endsection
