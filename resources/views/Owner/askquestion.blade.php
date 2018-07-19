@extends('layouts.masterowner')
@section('title',"RoomFinder-Owner-Forum-AskQuestions")
@section('content-section')
<div class="container" style="margin-top:10px;">
    <div class="row">
     @include('validation-error-message')
     @include('success_message')
     <div class="col-md-8 col-md-offset-2" style="margin-top: 12px;">
        <div class="panel panel-default">
            <div class="panel-heading">Post Your Questions Here!</div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{route('owner.askquestion.submit')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                        <label for="question" class="col-md-4 control-label">Question</label>

                        <div class="col-md-6">
                            <textarea name="question" cols="46" rows="5" required></textarea>

                            @if ($errors->has('question'))
                            <span class="help-block">
                                <strong>{{ $errors->first('question') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Post
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
