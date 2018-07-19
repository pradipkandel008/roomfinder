@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Rooms")
@section('content-section')
    <style>

    </style>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            @include('success_message')
            @if(count($rooms)==0)
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <h1 class="btn btn-danger">Oops! No room available now</h1>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            @else

                    <table class="displpaytable" border="1px solid red">
                        <tr style="font-weight: bold;">
                            <td>Location</td>
                            <td>Owner First Name</td>
                            <td>Owner Last Name</td>
                            <td>No of Rooms</td>
                            <td>Price</td>
                            <td>Water Facility</td>
                            <td>Parking</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Image</td>
                        </tr>
                        @foreach($rooms as $singleroom)
                    <tr>
                        <td>{{$singleroom->location}}</td>
                        <td>{{$singleroom->owner_first_name}}</td>
                        <td>{{$singleroom->owner_last_name}}</td>
                        <td>{{$singleroom->no_of_rooms}}</td>
                        <td>{{$singleroom->price}}</td>
                        <td>{{$singleroom->water_facility}}</td>
                        <td>{{$singleroom->parking}}</td>
                        <td>{{$singleroom->email}}</td>
                        <td>{{$singleroom->phone}}</td>
                        <td><img  class="img-responsive" width="80px" src="{{asset('image/uploads/rooms/'.$singleroom->image)}}"></td>
                    </tr>
                        @endforeach
                    </table>


            @endif

            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{$rooms->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection