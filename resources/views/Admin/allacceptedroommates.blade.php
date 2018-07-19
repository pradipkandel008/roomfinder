@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Accepted Roommates")
@section('content-section')

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            @include('success_message')
            @if(count($roommates)==0)
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <h1 class="btn btn-danger">Oops! No roommate request has yet been accepted</h1>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            @else

                <table class="displpaytable" border="1px solid red">
                    <tr style="font-weight: bold;">
                        <td>Location</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Gender</td>
                        <td>DOB</td>
                        <td>Occupation</td>
                        <td>Marital Status</td>
                        <td>No of Rooms</td>
                        <td>Water Facility</td>
                        <td>Parking</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Image</td>
                    </tr>
                    @foreach($roommates as $singleroommate)
                        <tr>
                            <td>{{$singleroommate->location}}</td>
                            <td>{{$singleroommate->first_name}}</td>
                            <td>{{$singleroommate->last_name}}</td>
                            <td>{{$singleroommate->gender}}</td>
                            <td>{{$singleroommate->dob}}</td>
                            <td>{{$singleroommate->occupation}}</td>
                            <td>{{$singleroommate->marital_status}}</td>
                            <td>{{$singleroommate->no_of_rooms}}</td>
                            <td>{{$singleroommate->water_facility}}</td>
                            <td>{{$singleroommate->parking}}</td>
                            <td>{{$singleroommate->email}}</td>
                            <td>{{$singleroommate->phone}}</td>
                            <td><img  class="img-responsive" width="80px" src="{{asset('image/uploads/roommates/'.$singleroommate->image)}}"></td>
                        </tr>
                    @endforeach
                </table>


            @endif

            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{$roommates->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection