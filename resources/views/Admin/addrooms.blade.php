@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Add Rooms")
@section('content-section')

<div class="container" style="margin-top:10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Room Register</div>
                @include ('validation-error-message')
                @if(session()->has('success_message'))
                <div class="alert alert-info" style="margin-bottom: -10px;">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>{!!session()->get('success_message')!!}</strong>
                </div>
                @endif
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.roomregister.submit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <?php $user=Auth::user()->email;?>
                         <input type="hidden" name="user" value="<?php echo $user?>">

                        <div class="form-group{{ $errors->has('owner_first_name') ? ' has-error' : '' }}">
                            <label for="owner_first_name" class="col-md-4 control-label">Owner First Name</label>

                            <div class="col-md-6">
                                <input id="owner_first_name" type="text" class="form-control" name="owner_first_name" value="{{ old('owner_first_name') }}" autofocus>

                                @if ($errors->has('owner_first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('owner_first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('owner_last_name') ? ' has-error' : '' }}">
                            <label for="owner_last_name" class="col-md-4 control-label">Owner Last Name</label>

                            <div class="col-md-6">
                                <input id="owner_last_name" type="text" class="form-control" name="owner_last_name" value="{{ old('owner_last_name') }}" autofocus>

                                @if ($errors->has('owner_last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('owner_last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <select name="price" class="form-control" value="{{ old('price') }}" >
                                    <option>1000</option>
                                    <option>2000</option>
                                    <option>3000</option>
                                    <option>4000</option>
                                    <option>5000</option>
                                    <option>6000</option>
                                    <option>7000</option>
                                    <option>8000</option>
                                    <option>9000</option>
                                    <option>10000</option>
                                    <option>11000</option>
                                    <option>12000</option>
                                    <option>13000</option>
                                    <option>14000</option>
                                    <option>15000</option>
                                    <option>16000</option>
                                    <option>18000</option>
                                    <option>19000</option>
                                    <option>20000</option>
                                    <option>Above 20000</option>


                                </select>

                                 @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
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



                         <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" autofocus>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('water_facility') ? ' has-error' : '' }}">
                            <label for="water_facility" class="col-md-4 control-label">Water Facility</label>

                            <div class="col-md-6">
                                <select name="water_facility" class="form-control" value="{{ old('water_facility') }}" >
                                    <option>Once a week</option>
                                    <option>Twice a week</option>
                                    <option>Thrice a week</option>
                                    <option>Four times a week</option>
                                    <option>Five times a week</option>
                                    <option>Six times a week</option>
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

                         <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
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