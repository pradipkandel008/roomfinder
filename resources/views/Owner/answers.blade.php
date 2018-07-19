<style>
.forumtable{
    margin: 15px;
}
.title{
    width:800px;
}
.title2{
    width:300px;
}
</style>
@extends ('layouts.masterowner')
@section('title',"RoomFinder-Owner-Forum-Answers")
@section('content-section')

<div class="container" style="margin-top: 10px;">
    <div class="row">
         @include('success_message')
        @if(count($answers)==0)
        <table class="forumtable">
            @foreach ($questions as $singlequestion)
            <tr>
                <td class="title" style="color:red;font-size:20px">
                    Title: <strong>{{$singlequestion->title}}</strong>
                </td>
                <td class="title2" style="color:#ff8e27;">
                    Asked by:<strong>{{$singlequestion->asked_by}}</strong>
                </td>
            </tr>
            <tr>
                <td class="title">
                    Question: {{$singlequestion->question}}
                </td>
                <td class="title2" style="color:#ff8930;">
                    Asked on:{{$singlequestion->qc}}
                </td>
            </tr>
            @endforeach
        </table>
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                <h1 class="btn btn-danger">Oops!This question has no replies yet</h1>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        @else
        <table class="forumtable">
            @foreach ($questions as $singlequestion)
            <tr>
                <td class="title" style="color:red;font-size:20px">
                    Title: <strong>{{$singlequestion->title}}</strong>
                </td>
                <td class="title2" style="color:#ff8e27;">
                    Asked by:<strong>{{$singlequestion->asked_by}}</strong>
                </td>
            </tr>
            <tr>
                <td class="title">
                    Question: {{$singlequestion->question}}
                </td>
                <td class="title2" style="color:#ff8930;">
                    Asked on:{{$singlequestion->qc}}
                </td>
            </tr>
            @endforeach
        </table>
        <strong style="color:red; margin-left: 15px; font-size: 20px;">Answers</strong>
        @foreach($answers as $singleanswer)
        <table class="forumtable">
            <tr>

                    <td class="title" >{{$singleanswer->answer}}</td>
                    <td class="title2" style="color:#ff8e27;" >Replied by:{{$singleanswer->replied_by}}<br/>
                        Replied On:{{$singleanswer->ac}}</td>
                </tr>
            </table>
            @endforeach


            @endif

            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{$answers->links()}}
                </div>
            </div>
        </div>
    </div>


    @endsection