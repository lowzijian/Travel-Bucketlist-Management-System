<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Travel_bucket_item;
use App\Travel_bucket_country;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TravelBucketItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request (Newly added)
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // To get the countries from all the items
        $items = Travel_bucket_item::where('user_id', '=', $user->id)->with('Travel_bucket_country')->get();
        $countries = array();
        foreach ($items as $item) {
            array_push($countries, $item->Travel_bucket_country);
        }

        // To apply filters specified by user
        $has_country_id = $request->has('country_id') && $request->input('country_id') !== 'default';
        $has_status = $request->has('status') && $request->input('status') !== 'default';

        $items = Travel_bucket_item::where([
            ['user_id', '=', $user->id],
            ['country_id', $has_country_id ? '=' : '!=', $request->input('country_id')]
        ])->with('Travel_bucket_country')->get();

        $selected_country = null;
        if ($has_country_id) {
            // Get the info of the selected country
            $selected_country = $items[0]->Travel_bucket_country;
        }

        // info($items);

        // function testing() {
        //     info('Something fishy happens');
        //     global $items;
        //     if (empty($items)) {
        //         info('Something fishy happens');
        //     }
        //     // foreach ($items as $item) {
        //     //     array_push($countries, $item->Travel_bucket_country);
        //     // }
        // }

        // testing();

        return view('Users.index')->with([
            'user' => $user,
            'items' => $items,
            'countries' => $countries,
            'selected_country' => $selected_country
        ]);
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
            $photoName = time() . '@' . ($current_user->id) . '.' . request()->photos->getClientOriginalExtension();
            request()->photos->move(public_path('photos'), $photoName);
            $path = 'photos' . "\\" . $photoName;
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
        //$travelBucketItem = Travel_bucket_item::where('Travel_bucket_items.id','=',$id)->leftJoin('Travel_bucket_countries', 'Travel_bucket_countries.id', '=', 'Travel_bucket_items.country_id')->get();
        $travelBucketItem = DB::select(DB::raw("SELECT i.id, i.updated_at, i.title, i.caption, i.description, i.city, i.photos, i.start_date, i.end_date, c.`name` AS `countryName`
        FROM travel_bucket_items i JOIN travel_bucket_countries c ON i.country_id=c.id WHERE i.id='" . $id . "'"));
        //where('Travel_bucket_items.id','=',$id)->leftJoin('Travel_bucket_countries', 'Travel_bucket_countries.id', '=', 'Travel_bucket_items.country_id')->get();
        if (!$travelBucketItem) throw new ModelNotFoundException;

        $user = Auth::user();
        if (!$user) throw new ModelNotFoundException;

        //return $travelBucketItem;
        return view('Users.show', [
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
