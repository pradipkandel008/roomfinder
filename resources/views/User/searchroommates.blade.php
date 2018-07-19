@extends ('layouts.masteruser')
@section('title',"RoomFinder-User-Search")
@section('content-section')

    <div class="container" style="margin-top:10px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Roommate Search</div>
                    @include ('validation-error-message')
                    @include('success_message')
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('user.roommatesearch.submit') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-4 control-label">Select Category</label>

                                <div class="col-md-6">
                                    <select name="category" class="form-control" >
                                        <option>Location</option>
                                        <option>Gender</option>
                                        <option>Occupation</option>
                                        <option>Marital status</option>
                                        <option>No of rooms</option>
                                        <option>Water facility</option>
                                        <option>Parking</option>
                                    </select>

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
                                <label for="search" class="col-md-4 control-label">Search</label>

                                <div class="col-md-6">
                                    <input id="search" type="text" class="form-control" name="search" autofocus
                                    placeholder="Search" required>

                                    @if ($errors->has('search'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('search') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection