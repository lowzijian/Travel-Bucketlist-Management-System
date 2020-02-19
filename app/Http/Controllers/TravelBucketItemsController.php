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
    function filter_status_visited($item)
    {
        // Convert back to collection
        $item_collection = collect($item);
        $item_json = $item_collection->toJson();
        $item_decoded = json_decode($item_json);

        // toJson() method converts the collection into a JSON serialized string
        if ($item_decoded->end_date) {
            $current_time = time();
            return (strtotime($item_decoded->end_date) - $current_time) < 0;
        } else {
            return true;
        }
    }

    function filter_status_not_visited($item)
    {
        // Convert back to collection
        $item_collection = collect($item);
        $item_json = $item_collection->toJson();
        $item_decoded = json_decode($item_json);

        // toJson() method converts the collection into a JSON serialized string
        if ($item_decoded->end_date) {
            $current_time = time();
            return (strtotime($item_decoded->end_date) - $current_time) > 0;
        } else {
            return true;
        }
    }

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
        $items = Travel_bucket_item::where('user_id', '=', $user->id)->with('travel_bucket_country')->get();
        $countries = array();
        foreach ($items as $item) {
            array_push($countries, $item->travel_bucket_country);
        }

        // To apply filters specified by user
        $has_country_id = $request->has('country_id') && $request->input('country_id') !== 'default';
        $has_status = $request->has('status') && $request->input('status') !== 'default';

        $items = Travel_bucket_item::where([
            ['user_id', '=', $user->id],
            ['country_id', $has_country_id ? '=' : '!=', $request->input('country_id')],
        ])->with('travel_bucket_country')->get();

        if ($has_status) {
            // Note: toArray also converts all of the collection's nested objects to an array.
            $items = array_filter($items->toArray(), array($this, $request->input('status') === 'visited' ? "filter_status_visited" : "filter_status_not_visited"));
            $items = collect($items)->values()->toJson();
            $items = json_decode($items);
        }

        $selected_country = null;
        if ($has_country_id && count($items) !== 0) {
            // Get the info of the selected country

            /*
                IMPORTANT:
                Originally, should be able to access the relationship model
                After json_decode, the relationship linkage will be gone
                Therefore, try to ensure the naming is consistent
            */
            $selected_country = $items[0]->travel_bucket_country;
        }

        return view('Users.index')->with([
            'user' => $user,
            'items' => $items,
            'countries' => array_unique($countries),
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
        // $travelBucketItem = DB::select(DB::raw("SELECT i.id, i.updated_at, i.title, i.caption, i.description, i.city, i.photos, i.start_date, i.end_date, i.experience ,c.`name` AS `countryName`
        // FROM travel_bucket_items i JOIN travel_bucket_countries c ON i.country_id=c.id WHERE i.id='" . $id . "'"));
        $travelBucketItem = Travel_bucket_item::where('id', '=', $id)->with('travel_bucket_country')->first();
        //where('Travel_bucket_items.id','=',$id)->leftJoin('Travel_bucket_countries', 'Travel_bucket_countries.id', '=', 'Travel_bucket_items.country_id')->get();
        $this->authorize('view', $travelBucketItem);
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
        $item = Travel_bucket_item::find($id);
        if (!$item) throw new ModelNotFoundException;

        $selectedCountry = Travel_bucket_country::where('id', '=', $item->country_id)->get();
        $countries = Travel_bucket_country::all();

        return view('Users.edit', [
            'item' => $item,
            'countries' => $countries,
            'selectedCountry' => $selectedCountry
        ]);
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

        $current_user = Auth::user();
        $travel_bucket_item = Travel_bucket_item::find($id);
        $this->authorize('update', $travel_bucket_item);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travel_bucket_item = Travel_bucket_item::find($id);
        $this->authorize('delete', $travel_bucket_item);
        $travel_bucket_item_title = $travel_bucket_item;
        $travel_bucket_item->delete();
        $response = `$travel_bucket_item_title deleted successfully`;
        return redirect('/home')->with($response);
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
