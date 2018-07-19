@extends ('layouts.masterowner')
@section('title',"RoomFinder-Owner-Mine Booked Rooms")
@section('content-section')

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            @include('success_message')
            @if(count($rooms)==0)
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <h1 class="btn btn-danger">Oops! Your rooms havenot been booked yet</h1>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            @else
                @foreach($rooms as $singleroom)
                    <div class="col-md-6 col-sm-8">
                        <div class="grid" >
                            <figure class="effect-ming">
                                <img  class="img-responsive" src="{{asset('image/uploads/bookedrooms/'.$singleroom->image)}}">
                                <figcaption>
                                    <h3> {{$singleroom->no_of_rooms}} room available at {{$singleroom->rl}}
                                    </h3><br/>
                                    <p class="links">
                                        Owner:{{$singleroom->fn}}  {{$singleroom->ln}}<br/>
                                        Booked by:{{$singleroom->first_name}} {{$singleroom->last_name}}<br/>
                                        <span>Gender: {{$singleroom->gender}}</span><br>
                                        <span> Age:{{Carbon\Carbon::createFromFormat('Y-m-d',$singleroom->dob)->age}}
                                            years old</span><br/>
                                        <span>Occupation:{{$singleroom->occupation}}<br/>
                                    Marital Status:{{$singleroom->marital_status}}
                                            <br/>
                                    Email:{{$singleroom->email}}<br/>
                                    Phone:{{$singleroom->phone}}<br/>

                                    Accepted on:{{$singleroom->created_at}}</span><br/>
                                    </p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{$rooms->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection