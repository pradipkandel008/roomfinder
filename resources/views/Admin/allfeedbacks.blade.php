@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Rooms")
@section('content-section')
    <style>

    </style>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            @include('success_message')
            @if(count($feedbacks)==0)
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <h1 class="btn btn-danger">Oops! No question available now</h1>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            @else

                <table class="displpaytable" border="1px solid red">
                    <tr style="font-weight: bold;">

                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Feedback</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Website</td>
                    </tr>
                    @foreach($feedbacks as $singlefeedback)
                        <tr>
                            <td>{{$singlefeedback->first_name}}</td>
                            <td>{{$singlefeedback->last_name}}</td>
                            <td>{{$singlefeedback->feedback}}</td>
                            <td>{{$singlefeedback->email}}</td>
                            <td>{{$singlefeedback->phone}}</td>
                            <td>{{$singlefeedback->website}}</td>
                        </tr>
                    @endforeach
                </table>


            @endif

            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{$feedbacks->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection