@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Rooms")
@section('content-section')
    <style>

    </style>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            @include('success_message')
            @if(count($questions)==0)
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <h1 class="btn btn-danger">Oops! No question available now</h1>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            @else

                <table class="displpaytable" border="1px solid red">
                    <tr style="font-weight: bold;">

                        <td>Title</td>
                        <td>Question</td>
                        <td>Asked by</td>
                    </tr>
                    @foreach($questions as $singlequestion)
                        <tr>
                            <td>{{$singlequestion->title}}</td>
                            <td>{{$singlequestion->question}}</td>
                            <td>{{$singlequestion->asked_by}}</td>
                        </tr>
                    @endforeach
                </table>


            @endif

            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{$questions->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection