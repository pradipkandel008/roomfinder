@extends ('layouts.masteruser')
@section('title',"RoomFinder-User-About Us")
@section('content-section')


<div class="container" style="margin-top:10px;">
 <!--    <ul class="breadcrumb">
  <li><a href="{{route('homepageuser')}}">User</a></li>
  <li>About Us</li>
</ul> -->
    <div class="row">
        <div class="col-md-12" style="background-color: #049729">
            <div class="text-center">
            <h1 style="color:white;text-transform: uppercase;">About RoomFinder</h1>
                <h4 style="color:white;">RoomFinder is the first digital online system of Nepal on advertising rooms and posting roommate requests.
                We have given user different category for registering their account. Once a user is registered, he/she can enjoy using
                    this application. We have as many as house owners connected with us and we advertise their rooms which are available for rent.
                So we make rooms available all the time. You can visit view rooms and book any rooms you like. We are also connected with people
                who are in search of roommates. So if you post roommate requests, we always try to find them for you as soon as possible.
                    You can contact us at any time if you need our help. Contact details are given at the bottom of every page.
                    We are always ready to help you. And this is our main goal too. We have systematised
                the way of finding rooms and roommates for the people who are new to different cities.</h4>
            </div>
        </div>

        <div class="col-md-12" style="background-color: #049729">
            <div class="text-center">
                <h1 style="color:white;">OUR SERVICES</h1>
            </div>
            <div class="text" style="margin-left: 100px;">
            <div class="owner" style="color:white;float:left">
                <li style="list-style: none;"><img src="{{asset('image/booking.png')}}" width='100px'>  Book Rooms</li>
                <li style="list-style: none;"><img src="{{asset('image/accept1.png')}}" width='100px' style="border-radius: 50px;">  Accept Roommate Request</li>
                <li style="list-style: none;"><img src="{{asset('image/add.png')}}" width='100px'>Post Roommate Request</li>


            </div>
            <div class="owner" style="color:white;float:left;">
                <li style="list-style: none;"><img src="{{asset('image/ad.png')}}" width='100px'  style="border-radius: 50px;">Advertise Your Rooms</li>
                <li style="list-style: none;"><img src="{{asset('image/view.png')}}" width='100px'>View Booking of Your Rooms</li>
                <li style="list-style: none;"><img src="{{asset('image/view.png')}}" width='100px'>View Your Accepted Roommate Requests</li>

            </div>
                <div class="owner" style="color:white;float:left;">
                    <li style="list-style: none;"><img src="{{asset('image/forum.png')}}" width='100px'  style="border-radius: 50px;"> Discussion Forum</li>
                    <li style="list-style: none;"><img src="{{asset('image/feedback.png')}}" width='100px'>Post Feedback</li>
                </div>
        </div>
        </div>

        <div class="col-md-8 col-md-offset-2" style="margin-top: 25px;">
            <div class="panel panel-default">
                <div class="panel-heading">Post Your Feedback Here!</div>
                @include ('validation-error-message')
                @include('success_message')
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('feedback.submit')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

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
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('feedback') ? ' has-error' : '' }}">
                            <label for="feedback" class="col-md-4 control-label">Feedback</label>

                            <div class="col-md-6">
                               <textarea  id="feedback" name="feedback" cols="46" rows="5"></textarea>

                                @if ($errors->has('feedback'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('feedback') }}</strong>
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

                        <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label">Website</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}">

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send
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