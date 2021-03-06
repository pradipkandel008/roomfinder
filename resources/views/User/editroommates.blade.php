@extends ('layouts.masteruser')
@section('title',"RoomFinder-User-Edit roommates")
@section('content-section')

<div class="container" style="margin-top:10px;">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Roommate Request Update</div>
                @include ('validation-error-message')
                @include('success_message')
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('user.roommate.update',$roommate->id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <?php $user=Auth::user()->email;?>
                        <input id="user" type="hidden" name="user" value="<?php echo $user?>">

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value={{$roommate->location}} autofocus>

                                @if ($errors->has('location'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{$roommate->first_name}}" autofocus>

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
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{$roommate->last_name}}" autofocus>

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
                                    <option {{($roommate->gender=='Male')?"selected":""}}>Male</option>
                                    <option {{($roommate->gender=='Female')?"selected":""}}>Female</option>

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
                                <input id="dob" type="date" class="form-control" name="dob" value="{{$roommate->dob}}" autofocus>

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
                                    <option {{($roommate->marital_status=='Single')?"selected":""}}>Single</option>
                                    <option {{($roommate->marital_status=='Married')?"selected":""}}>Married</option>

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
                                <input id="occupation" type="text" class="form-control" name="occupation" value="{{$roommate->occupation}}" autofocus>

                                @if ($errors->has('occupation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('occupation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('no_of_rooms') ? ' has-error' : '' }}">
                            <label for="no_of_rooms" class="col-md-4 control-label">No of rooms</label>

                            <div class="col-md-6">
                                <select id="no_of_rooms" name="no_of_rooms" class="form-control" value="{{ old('no_of_rooms') }}" >
                                    <option {{($roommate->no_of_rooms=='1')?"selected":""}}>1</option>
                                    <option {{($roommate->no_of_rooms=='2')?"selected":""}}>2</option>
                                    <option {{($roommate->no_of_rooms=='3')?"selected":""}}>3</option>
                                    <option {{($roommate->no_of_rooms=='4')?"selected":""}}>4</option>
                                    <option {{($roommate->no_of_rooms=='5')?"selected":""}}>5</option>
                                    <option {{($roommate->no_of_rooms=='6')?"selected":""}}>6</option>
                                    <option {{($roommate->no_of_rooms=='7')?"selected":""}}>7</option>
                                    <option {{($roommate->no_of_rooms=='8')?"selected":""}}>8</option>
                                    <option {{($roommate->no_of_rooms=='9')?"selected":""}}>9</option>
                                    <option {{($roommate->no_of_rooms=='10')?"selected":""}}>10</option>
                                    <option {{($roommate->no_of_rooms=='10+')?"selected":""}}>10+</option>

                                </select>

                                @if ($errors->has('no_of_rooms'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_of_rooms') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('water_facility') ? ' has-error' : '' }}">
                            <label for="water_facility" class="col-md-4 control-label">Water Facility</label>

                            <div class="col-md-6">
                                <select id="water_facility" name="water_facility" class="form-control" value="{{ old('water_facility') }}" >
                                    <option {{($roommate->water_facility=='One day in a week')?"selected":""}}>One day in a week</option>
                                    <option {{($roommate->water_facility=='Two days in a week')?"selected":""}}>Two days in a week</option>
                                    <option {{($roommate->water_facility=='Three days in a week')?"selected":""}}>Three days in a week</option>
                                    <option {{($roommate->water_facility=='Four days in a week')?"selected":""}}>Four days in a week</option>
                                    <option {{($roommate->water_facility=='Five days in a week')?"selected":""}}>Five days in a week</option>
                                    <option {{($roommate->water_facility=='Six days in a week')?"selected":""}}>Six days in a week</option>
                                    <option {{($roommate->water_facility=='All days in a week')?"selected":""}}>All days in a week</option>
                                    <option {{($roommate->water_facility=='24 hours')?"selected":""}}>24 hours</option>

                                </select>

                                @if ($errors->has('water_facility'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('water_facility') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('parking') ? ' has-error' : '' }}">
                            <label for="parking" class="col-md-4 control-label">Parking</label>

                            <div class="col-md-6">
                                <select id="parking" name="parking" class="form-control" value="{{ old('parking') }}" >
                                    <option {{($roommate->parking=='Yes')?"selected":""}}>Yes</option>
                                    <option {{($roommate->parking=='No')?"selected":""}}>No</option>

                                </select>

                                @if ($errors->has('parking'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('parking') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file"  name="image">
                                Current image:<img class="img-responsive" src="{{asset('image/uploads/roommates/'.$roommate->image)}}" width="100px">

                                @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Contact E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$roommate->email}}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Contact Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" value="{{$roommate->phone}}">

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
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection