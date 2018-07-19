@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Roommatess")
@section('content-section')
    <style>
        .displaytable{
            background-color: #00FFFF;
            border:1px solid white;
            width:100%;
        }
        .displaytable tr td{
            margin: 5px;
            padding: 10px;
        }
    </style>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            @include('success_message')
            @if(count($requests)==0)
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <h1 class="btn btn-danger">Oops! No admin requests available</h1>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            @else
                        <table class="displaytable" border="1px red" style="background-color: #bef1ff;">
                            <tr style="font-weight: bold;">
                            <td>Firstname</td>
                            <td>Lastname</td>
                            <td>Gender</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Username</td>
                                <td>Image</td>
                            <td>Action</td>
                            </tr>
                            @foreach($requests as $singlerequest)
                            <tr>
                                <td>{{$singlerequest->first_name}}</td>
                                <td>{{$singlerequest->last_name}}</td>
                                <td>{{$singlerequest->gender}}</td>
                                <td>{{$singlerequest->email}}</td>
                                <td>{{$singlerequest->phone}}</td>
                                <td>{{$singlerequest->user_name}}</td>
                                <td><img  class="img-reponsive" width="80px" src="{{asset('image/uploads/admins/'.$singlerequest->image)}}"></td>
                                </td>
                                <td> <form class="form-horizontal" method="POST" action="{{route('admin.approverequest',$singlerequest->id)}}" enctype="multipart/form-data" >
                                        {{ csrf_field() }}

                                        <input type="text" name="id" value="{{$singlerequest->aid}}" hidden>
                                        <div class="col-md-6">
                                            <input id="first_name" type="text" class="form-control" name="first_name"
                                                   value="{{ $singlerequest->first_name}}" autofocus hidden>
                                        </div>


                                        <div class="col-md-6">
                                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $singlerequest->last_name}}" autofocus hidden>
                                        </div>


                                        <div class="col-md-6">
                                            <input id="gender" type="text" class="form-control" name="gender" value="{{ $singlerequest->gender }}" hidden >
                                        </div>


                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{$singlerequest->email}}" hidden>
                                        </div>

                                        <div class="col-md-6">
                                            <input id="phone" type="number" class="form-control" name="phone" value="{{$singlerequest->phone}}" hidden>
                                        </div>

                                        <div class="col-md-6">
                                            <input id="image" class="form-control" type="text" name="image" value="{{$singlerequest->image}}" hidden>
                                        </div>

                                        <div class="col-md-6">
                                            <input id="user_name" type="text" class="form-control" name="user_name" value="{{$singlerequest->user_name }}" autofocus hidden>
                                        </div>

                                        <div class="col-md-6">
                                            <input id="password" type="text" class="form-control" name="password" value="{{$singlerequest->password}}" hidden>
                                            </span>
                                        </div>


                                        <span><button class=" btn btn-success" type="submit" onclick="confirm('Are you sure want to approve this request?')">Approve</button></span>


                                    </form> </td>

                            </tr>
                            @endforeach
                        </table>
            @endif

            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{$requests->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection