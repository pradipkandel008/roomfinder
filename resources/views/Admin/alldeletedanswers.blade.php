@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Deleted Answers")
@section('content-section')
    <style>

    </style>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            @include('success_message')
            @if(count($answers)==0)
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <h1 class="btn btn-danger">Oops! No answers deleted yet</h1>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            @else

                <table class="displpaytable" border="1px solid red">
                    <tr style="font-weight: bold;">

                        <td>Answer</td>
                        <td>Replied by</td>
                    </tr>
                    @foreach($answers as $singleanswer)
                        <tr>
                            <td>{{$singleanswer->answer}}</td>
                            <td>{{$singleanswer->replied_by}}</td>
                        </tr>
                    @endforeach
                </table>


            @endif

            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{$answers->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection