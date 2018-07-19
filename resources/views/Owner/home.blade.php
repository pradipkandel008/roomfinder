@extends('layouts.masterowner')

@section('content-section')
<div class="container"  style="margin-top:100px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Owner Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as Owner!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
