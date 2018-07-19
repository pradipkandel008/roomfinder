@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Mine Roommate Accept")
@section('content-section')

<div class="container" style="margin-top: 10px;">
    <div class="row">
         @include('success_message')
        @if(count($roommates)==0)
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                <h1 class="btn btn-danger">Oops! Your roommate requests havenot been accepted yet</h1>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        @else
        @foreach($roommates as $singleroommate)
        <div class="col-md-6 col-sm-8">
            <div class="grid" >
                <figure class="effect-ming">
                    <img  class="img-responsive" src="{{asset('image/uploads/acceptedroommates/'.$singleroommate->image)}}">
                    <figcaption>
                        <h3> Roommate needed for {{$singleroommate->rfn}} {{$singleroommate->rln}}
                            at  {{$singleroommate->rl}} </h3><br/>
                            <p class="links">
                                Accepted by:{{$singleroommate->first_name}} {{$singleroommate->last_name}}<br/>
                                <span>Gender: {{$singleroommate->gender}}</span><br>
                                <span> Age:{{Carbon\Carbon::createFromFormat('Y-m-d',$singleroommate->dob)->age}}
                                years old</span><br/>
                                <span>Occupation:{{$singleroommate->occupation}}<br/>
                                    Marital Status:{{$singleroommate->marital_status}}
                                    <br/>
                                    Email:{{$singleroommate->email}}<br/>
                                    Phone:{{$singleroommate->phone}}<br/>

                                    Accepted on:{{$singleroommate->created_at}}</span><br/>
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