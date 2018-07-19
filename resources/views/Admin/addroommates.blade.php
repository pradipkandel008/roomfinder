@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Add Roommates")
@section('content-section')

<div class="container" style="margin-top:10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post Roommate Request</div>
                @include ('validation-error-message')
                @include('success_message')
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.roommateregister.submit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <?php $user=Auth::user()->email;?>
                        <input type="hidden" name="user" value="<?php echo $user?>">


                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location of room</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" autofocus>

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
                                <select name="gender" class="form-control" value="{{ old('gender') }}" >
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
                                <select name="marital_status" class="form-control" value="{{ old('marital_status') }}" >
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



                        <div class="form-group{{ $errors->has('no_of_rooms') ? ' has-error' : '' }}">
                            <label for="no_of_rooms" class="col-md-4 control-label">No of rooms</label>

                            <div class="col-md-6">
                                <select name="no_of_rooms" class="form-control" value="{{ old('no_of_rooms') }}" >
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>Above 10</option>
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
                                <select name="water_facility" class="form-control" value="{{ old('water_facility') }}" >
                                    <option>One day in a week</option>
                                    <option>Two days in a week</option>
                                    <option>Three days in a week</option>
                                    <option>Four days in a week</option>
                                    <option>Five days in a week</option>
                                    <option>Six days in a week</option>
                                    <option>All days in a week </option>
                                    <option>24 hours</option>
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
                                <select name="parking" class="form-control" value="{{ old('parking') }}" >
                                    <option>Yes</option>
                                    <option>No</option>
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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

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
                                    Register
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