@extends ('layouts.masteruser')
@section('title',"RoomFinder-User-Roommatess")
@section('content-section')

<div class="container" style="margin-top: 10px;">
    <div class="row">
         @include('success_message')
        @if(count($roommates)==0)
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                <h1 class="btn btn-danger">Oops! You havenot yet posted any roommate request</h1>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        @else
        @foreach($roommates as $singleroommate)
        <div class="col-md-6 col-sm-8">
            <div class="grid" >
                <figure class="effect-ming">
                    <img  class="img-responsive" src="{{asset('image/uploads/roommates/'.$singleroommate->image)}}">
                    <figcaption>
                        <h3> Roommate needed for {{$singleroommate->first_name}} {{$singleroommate->last_name}}
                            at  {{$singleroommate->location}} </h3><br/>
                            <p class="links">
                                <span>Gender: {{$singleroommate->gender}}</span><br>
                                <span> Age:{{Carbon\Carbon::createFromFormat('Y-m-d',$singleroommate->dob)->age}}
                                years old</span><br/>
                                <span>Occupation:{{$singleroommate->occupation}}<br/>
                                    Marital Status:{{$singleroommate->marital_status}}
                                    <br/>
                                    Email:{{$singleroommate->email}}<br/>
                                    Phone:{{$singleroommate->phone}}<br/>
                                    Room Facilities:{{$singleroommate->no_of_rooms}} room with
                                    {{$singleroommate->water_facility}} water facility,
                                    parking:{{$singleroommate->parking}}<br/>
                                    Published on:{{$singleroommate->updated_at}}</span><br/>
                                    <a href="{{route('user.roommate.edit',[$singleroommate->id])}}"><span class="btn btn-success">Edit</span></a>
                                    <a href="{{route('user.roommate.delete',[$singleroommate->id])}}"><span class="btn btn-danger" onclick="return confirm('Are you sure want to delete this roommate request?')">Delete</span></a>

                                </p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                @endforeach
                @endif

                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        {{$roommates->links()}}
                    </div>
                </div>
            </div>
        </div>


        @endsection