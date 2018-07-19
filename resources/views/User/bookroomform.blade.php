@extends ('layouts.masteruser')
@section('title',"RoomFinder-User-Book Room")
@section('content-section')

<div class="container" style="margin-top:10px;">
    <div class="row">
        @include('success_message')
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                <h1><b>Book This Room Here! </b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" style="float:left;">
                <div class="details" style="background-image: linear-gradient(#f7ffb4,lightgreen);text-transform: uppercase;">
                        <img  class="img-responsive" src="{{asset('image/uploads/rooms/'.$room->image)}}" >
                        <h3 style="margin:5px;"> {{$room->no_of_rooms}}
                    room available  at  {{$room->location}} </h3><br/>
                            <p class="links" style="margin: 5px;">
                                <span>Rs {{$room->price}} for {{$room->no_of_rooms}} room</span><br>
                                <span>Water:{{$room->water_facility}}<br/></span>
                                Location:{{$room->location}}<br/>
                                Parking:{{$room->parking}}<br/>
                                <span>Owner:{{$room->owner_first_name}} {{$room->owner_last_name}}<br/>
                                  Email:{{$room->email}}<br/>
                                  Phone:{{$room->phone}}
                                  <br/>
                                  Publish on:{{$room->updated_at}}</span><br/>
                              </p></div>

                  </div>
            <div class="col-md-8" style="float:left";>
                <div class="panel panel-default">
                    <div class="panel-heading">Provide us your details</div>
                    @include ('validation-error-message')
                    @include('success_message')
                    <div class="panel-body">
               
                <form  class="form-horizontal" action= "{{route('user.bookroom.submit',$room->id)}}" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <?php $user=Auth::user()->email;?>
                    <input id="user" type="hidden" name="user" value="<?php echo $user?>">
                    <?php $room_id=$room->id?>
                    <input  id="room_id" type="hidden" name="room_id" value="<?php echo $room_id?>">

                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name" class="col-md-4 control-label">First Name</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" autofocus>

                            @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name" class="col-md-4 control-label">Last Name</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" autofocus>

                            @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="gender" class="col-md-4 control-label">Gender</label>

                        <div class="col-md-6">
                            <select id="gender" name="gender" class="form-control" value="{{ old('gender') }}" >
                                <option>Male</option>
                                <option>Female</option>
                            </select>

                            @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                        <label for="dob" class="col-md-4 control-label">Date of Birth</label>

                        <div class="col-md-6">
                            <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" autofocus>

                            @if ($errors->has('dob'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }}">
                        <label for="marital_status" class="col-md-4 control-label">Marital status</label>

                        <div class="col-md-6">
                            <select id="marital_status" name="marital_status" class="form-control" value="{{ old('marital_status') }}" >
                                <option>Single</option>
                                <option>Married</option>
                            </select>

                            @if ($errors->has('marital_status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('marital_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">
                        <label for="occupation" class="col-md-4 control-label">Occupation</label>

                        <div class="col-md-6">
                            <input id="occupation" type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" autofocus>

                            @if ($errors->has('occupation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('occupation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image" class="col-md-4 control-label">Image</label>

                        <div class="col-md-6">
                            <input id="image" type="file"  name="image">

                            @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Phone Number</label>

                        <div class="col-md-6">
                            <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}">

                            @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>

                </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
</div>

@endsection