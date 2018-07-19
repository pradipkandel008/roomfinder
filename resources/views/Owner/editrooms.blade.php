@extends ('layouts.masterowner')
@section('title',"RoomFinder-Owner-Add Rooms")
@section('content-section')

    <div class="container" style="margin-top:10px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Room Update</div>
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
                        <form class="form-horizontal" method="POST" action="{{route('owner.room.update',$room->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <?php $user=Auth::user()->email;?>
                            <input type="hidden" name="user" value="<?php echo $user?>">

                            <div class="form-group{{ $errors->has('owner_first_name') ? ' has-error' : '' }}">
                                <label for="owner_first_name" class="col-md-4 control-label">Owner First Name</label>

                                <div class="col-md-6">
                                    <input id="owner_first_name" type="text" class="form-control" name="owner_first_name" value={{$room->owner_first_name}} autofocus>

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
                                    <input id="owner_last_name" type="text" class="form-control" name="owner_last_name" value={{$room->owner_last_name}} autofocus>

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
                                        <option {{($room->price=='1000')?"selected":""}}>1000</option>
                                        <option {{($room->price=='2000')?"selected":""}}>2000</option>
                                        <option {{($room->price=='3000')?"selected":""}}>3000</option>
                                        <option {{($room->price=='4000')?"selected":""}}>4000</option>
                                        <option {{($room->price=='5000')?"selected":""}}>5000</option>
                                        <option {{($room->price=='6000')?"selected":""}}>6000</option>
                                        <option {{($room->price=='7000')?"selected":""}}>7000</option>
                                        <option {{($room->price=='8000')?"selected":""}}>8000</option>
                                        <option {{($room->price=='9000')?"selected":""}}>9000</option>
                                        <option {{($room->price=='10000')?"selected":""}}>10000</option>
                                        <option {{($room->price=='11000')?"selected":""}}>11000</option>
                                        <option {{($room->price=='12000')?"selected":""}}>12000</option>
                                        <option {{($room->price=='13000')?"selected":""}}>13000</option>
                                        <option {{($room->price=='14000')?"selected":""}}>14000</option>
                                        <option {{($room->price=='15000')?"selected":""}}>15000</option>
                                        <option {{($room->price=='16000')?"selected":""}}>16000</option>
                                        <option {{($room->price=='17000')?"selected":""}}>17000</option>
                                        <option {{($room->price=='18000')?"selected":""}}>18000</option>
                                        <option {{($room->price=='19000')?"selected":""}}>19000</option>
                                        <option {{($room->price=='20000')?"selected":""}}>20000</option>
                                        <option {{($room->price=='20000+')?"selected":""}}>20000+</option>


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
                                        <option {{($room->no_of_rooms=='1')?"selected":""}}>1</option>
                                        <option {{($room->no_of_rooms=='2')?"selected":""}}>2</option>
                                        <option {{($room->no_of_rooms=='3')?"selected":""}}>3</option>
                                        <option {{($room->no_of_rooms=='4')?"selected":""}}>4</option>
                                        <option {{($room->no_of_rooms=='5')?"selected":""}}>5</option>
                                        <option {{($room->no_of_rooms=='6')?"selected":""}}>6</option>
                                        <option {{($room->no_of_rooms=='7')?"selected":""}}>7</option>
                                        <option {{($room->no_of_rooms=='8')?"selected":""}}>8</option>
                                        <option {{($room->no_of_rooms=='9')?"selected":""}}>9</option>
                                        <option {{($room->no_of_rooms=='10')?"selected":""}}>10</option>
                                        <option {{($room->no_of_rooms=='10+')?"selected":""}}>10+</option>


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
                                    <input id="location" type="text" class="form-control" name="location" value={{$room->location}} autofocus>

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
                                        <option {{($room->water_facility=='One day in a week')?"selected":""}}>One day in a week</option>
                                        <option {{($room->water_facility=='Two days in a week')?"selected":""}}>Two days in a week</option>
                                        <option {{($room->water_facility=='Three days in a week')?"selected":""}}>Three days in a week</option>
                                        <option {{($room->water_facility=='Four days in a week')?"selected":""}}>Four days in a week</option>
                                        <option {{($room->water_facility=='Five days in a week')?"selected":""}}>Five days in a week</option>
                                        <option {{($room->water_facility=='Six days in a week')?"selected":""}}>Six days in a week</option>
                                        <option {{($room->water_facility=='All days in a week')?"selected":""}}>All days in a week</option>
                                        <option {{($room->water_facility=='24 hours')?"selected":""}}>24 hours</option>
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
                                        <option {{($room->parking=='Yes')?"selected":""}}>Yes</option>
                                        <option {{($room->parking=='No')?"selected":""}}>No</option>
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
                                    Current image:<img class="img-responsive" src="{{asset('image/uploads/rooms/'.$room->image)}}" height="100px" width="100px" >
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
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $room->email }}">

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
                                    <input id="phone" type="number" class="form-control" name="phone" value="{{ $room->phone }}">

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