<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Travel_bucket_item;
use App\Travel_bucket_country;

class TravelBucketItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $items = Travel_bucket_item::where('user_id', '=', $user->id)->join('Travel_bucket_countries','Travel_bucket_countries.id','=','Travel_bucket_items.country_id')->get();
        return view('Users.index')->with(['user' => $user, 'items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$travelBucketItem = Travel_bucket_item::where('Travel_bucket_items.id','=',$id)->leftJoin('Travel_bucket_countries', 'Travel_bucket_countries.id', '=', 'Travel_bucket_items.country_id')->get();
        $travelBucketItem = DB::select(DB::raw("SELECT i.id, i.updated_at, i.title, i.caption, i.description, i.city, i.photos, i.start_date, i.end_date, c.`name` AS `countryName`
        FROM travel_bucket_items i JOIN travel_bucket_countries c ON i.country_id=c.id WHERE i.id='" . $id . "'"));
        //where('Travel_bucket_items.id','=',$id)->leftJoin('Travel_bucket_countries', 'Travel_bucket_countries.id', '=', 'Travel_bucket_items.country_id')->get();
        if(!$travelBucketItem) throw new ModelNotFoundException;

        $user = Auth::user();
        if(!$user) throw new ModelNotFouundException;

        //return $travelBucketItem;
        return view('Users.show',[
            'travelBucketItem' => $travelBucketItem,
            'user' => $user,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
