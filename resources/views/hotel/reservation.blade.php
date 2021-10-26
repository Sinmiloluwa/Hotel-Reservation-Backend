@extends('layouts.content')

@section('content')
@include('layouts.navbar')

<section id="reservationForm">
<div class="container px-1 py-5 mx-auto">
   
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
        @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block alert-dismissible fade show" role="alert">
    <strong>{{$message}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            
        </button>
    </div>
    @endif
            <h3><strong>Make a reservation</strong></h3>
            <p class="blue-text">Make a Reservation<br> Get an email </p>
            <div class="card" style="padding: 30px 40px;
    margin-top: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2);
    min-height:250px;
    overflow:hidden;
    ">
                <h5 class="text-center mb-4">You are one step away</h5>
                <form class="form-card" action="{{route('reservation.store',$hotel->id)}}" method="POST">
                    @csrf
                <input type="hidden"  name="hotel_id" class="form-control" value="{{$hotel->id}}" >
                
                <div class="row justify-content-between text-left mb-4">
                        <div class="form-group col-sm-12 flex-column d-flex "> <label class="form-control px-3 mb-3">Rooms<span class="text-danger"> *</span></label> <select name="room">
                            <option class="form-control"></option>
                            @foreach($rooms as $room)
                            <option class="form-control" name="room">{{$room->name}}</option>
                            @endforeach
                            @if($errors->has('room'))
                        <div class="error" style="color: red;">{{$errors->first('room')}}</div>
                        @endif
                        </select> 
                        
                    </div>
                    </div>
                    <div class="row justify-content-between text-left mb-4">
                        <div class="form-group col-sm-6 flex-column d-flex "> <label class="form-control px-3 mb-3">Check In<span class="text-danger"> *</span></label> <input type="date"  name="check_in" class="form-control" >  
                        @if($errors->has('check_in'))
                        <div class="error" style="color: red;">{{$errors->first('check_in')}}</div>
                        @endif</div>

                        <div class="form-group col-sm-6 flex-column d-flex "> <label class="form-control px-3 mb-3">Check Out<span class="text-danger"> *</span></label> <input type="date"  name="check_out" class="form-control" > 
                        @if($errors->has('check_out'))
                        <div class="error" style="color: red;">{{$errors->first('check_out')}}</div>
                        @endif</div>
                    </div>
                    <div class="row justify-content-between text-left mb-4">
                        <div class="form-group col-sm-6 flex-column d-flex "> <label class="form-control px-3 mb-3">Guests<span class="text-danger"> *</span></label> <input type="number" id="email" name="no_of_guests" placeholder="number of guests" class="form-control" >  
                        @if($errors->has('no_of_guests'))
                        <div class="error" style="color: red;">{{$errors->first('no_of_guests')}}</div>
                        @endif</div>
                        <div class="form-group col-sm-6 flex-column d-flex "> <label class="form-control px-3 mb-3">Phone number<span class="text-danger"> *</span></label> <input type="text" id="mob" name="phone" placeholder="" class="form-control" > 
                        @if($errors->has('phone'))
                        <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                        @endif</div>
                    </div>
                   
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6 py-5"> <button type="submit" class="btn btn-primary">Book Room</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@endsection