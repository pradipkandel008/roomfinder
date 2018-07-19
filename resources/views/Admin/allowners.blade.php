@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Owners")
@section('content-section')
    <style>

    </style>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            @include('success_message')
            @if(count($users)==0)
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <h1 class="btn btn-danger">Oops! No user available now</h1>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            @else

                <table class="displpaytable" border="1px solid red">
                    <tr style="font-weight: bold;">
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Gender</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Username</td>
                        <td>Image</td>
                    </tr>
                    @foreach($users as $singleuser)
                        <tr>
                            <td>{{$singleuser->first_name}}</td>
                            <td>{{$singleuser->last_name}}</td>
                            <td>{{$singleuser->gender}}</td>
                            <td>{{$singleuser->email}}</td>
                            <td>{{$singleuser->phone}}</td>
                            <td>{{$singleuser->user_name}}</td>
                            <td><img  class="img-responsive" width="80px" src="{{asset('image/uploads/owners/'.$singleuser->image)}}"></td>
                        </tr>
                    @endforeach
                </table>


            @endif

            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection