<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Attraction;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function searchHotel(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'check_in' => 'required',
            'check_out' => 'required'
        ]);

        

        $hotel_id = Hotel::where([
            ['city', '!=', Null],
            [function ($q) use ($request) {
                if (($city = $request->city)) {
                    $q->whereRaw('LOWER(`city`) like ?', '%' . $city . '%')->get();
                }
            }]
        ])->pluck('id');

        


        if ($hotel_id->count() > 0) {
            $room_id = DB::table('rooms')->whereIn('hotel_id',$hotel_id)->pluck('id');
            if ($room_id->count() > 0) {
                  // check if room is available for that time
            if ( Reservation::where('room_id',$room_id)->where('check_in', '>=', $request->check_in)
            ->where('check_out', '<=', $request->check_out)->exists()) {
            return back()->withErrors('This hotel has been booked');
            } else {
                $hotels = Hotel::where([
                    ['city', '!=', Null],
                    [function ($q) use ($request) {
                        if (($city = $request->city)) {
                            $q->whereRaw('LOWER(`city`) like ?', '%' . $city . '%')->get();
                        }
                    }]
                ])->get();
                return view('hotel.hotel-list', compact('hotels'));
            }
            } else{
                return back()->withErrors('No hotel was found available');
            }
           
        }

        else{
            // Check the rooms of each hotel attached to it
        return back()->withErrors('No hotel found in '. $request->city);
        }
   
    }

    public function allHotels()
    {
        $attractions = Attraction::all();
        $hotels = QueryBuilder::for(Hotel::class)
        ->allowedFilters([
            AllowedFilter::exact('attraction', 'attraction_id')
        ])->get();
        return view('hotel.listing', compact('hotels','attractions'));
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
        $hotel = Hotel::where('id',$id)->first();
        return view('hotel.hotelView',compact('hotel'));
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
