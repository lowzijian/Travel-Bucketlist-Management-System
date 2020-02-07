<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Travel_bucket_country;

class TravelBucketCountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Travel_bucket_country::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Travel_bucket_country::findOrFail($id);
    }
}
