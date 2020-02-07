<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Travel_bucket_country;
use App\Travel_bucket_item;
use Illuminate\Support\Facades\Auth;

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
        $travel_bucket_item = new Travel_bucket_item();
        $countries = Travel_bucket_country::all();
        return view('Users.create', [
            'travel_bucket_item' => $travel_bucket_item,
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user = Auth::user();
        $travel_bucket_item = new Travel_bucket_item;
        $travel_bucket_item->fill($request->all());
        $travel_bucket_item->user_id = $current_user->id;

        if (
            $request->hasFile('photos') &&
            $request->file('photos')->isValid()
        ) {
            $photoName = time() . '.' . request()->photos->getClientOriginalExtension();
            request()->photos->move(public_path('photos'), $photoName);
            $path = "\\" . $photoName;
            $imagePath = array($path);
            $travel_bucket_item->photos = json_encode($imagePath);
        }

        $travel_bucket_item->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'caption' => 'required',
            'description' => 'required',
            'country_id' => 'required',
            'photos' => 'sometimes|file|image|max:5000',
            'city' => 'required',
            'start_date' => 'sometimes',
            'end_date' => 'sometimes',
            'user_id' => 'required'
        ]);
    }

    private function storeImage($travel_bucket_item)
    {
        if (request()->has('photos')) {

            $travel_bucket_item->update([
                'photos' => request()->photos->store('uploads', 'public'),
            ]);
        }
    }
}
