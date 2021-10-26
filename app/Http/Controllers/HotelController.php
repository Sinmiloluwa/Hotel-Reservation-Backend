<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Attraction;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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

    public function reservationView($id)
    {
        $hotel = Hotel::where('id',$id)->first();
        $room_type_id = DB::table('rooms')->where('hotel_id',$id)->pluck('room_type_id');
        $rooms = DB::table('room_type')->whereIn('id',$room_type_id)->get();
        return view('hotel.reservation',compact('rooms','hotel'));
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

    public function makeReservation(Request $request, $hotel_id)
    {
       $validator =  Validator::make($request->all(), [
            'room' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'no_of_guests' => 'required',
            'phone' => 'required|min:11|max:11|regex:/[0-9]{9}/'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $room_type_guest = DB::table('room_type')->where('name',$request->room)->value('max_guest');

        if ($request->no_of_guests > $room_type_guest) {
            return back()->with('error', 'The number of guests exceeded for '.$request->room);
        }

        $room_type_id = DB::table('room_type')->where('name',$request->room)->value('id');
        $room_id = DB::table('rooms')->where('room_type_id',$room_type_id)->where('hotel_id',$hotel_id)->value('id');


        $confirmation = DB::table('rooms')->where('room_type_id',$room_type_id)->where('hotel_id',$hotel_id)->where('status_id',2)->exists();

        if ($confirmation) {
            $isReserved = Reservation::where('room_id',$room_id)->where('hotel_id',$hotel_id)->exists();

            if ($isReserved == true) {
                if ( Reservation::where('room_id',$room_id)->where('check_in', '>=', $request->check_in)
                ->where('check_out', '<=', $request->check_out)->exists()) {
                    return back()->with('error','All '.$request->room. ' rooms have been reserved for this date');
                } else {
                    $reservation = new Reservation;
                    $reservation->room_id = $room_id;
                    $reservation->hotel_id = $request->hotel_id;
                    $reservation->check_in = $request->check_in;
                    $reservation->check_out = $request->check_out;
                    $reservation->no_of_guests = $request->no_of_guests;
                    $reservation->phone = $request->phone;
                    $reservation->save();

                    DB::table('rooms')->update([
                        'status_id' => 1
                    ]);

                    return redirect()->route('hotel.list')->with('success', 'Your hotel room has been reserved');
                }

            } else {
                return back()->with('error','All '.$request->room. ' rooms are occupied at the moment');
            }


        } else {
            return back()->with('error','No '.$request->room. ' available at the moment');
        }

        

        

        


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
