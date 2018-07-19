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
@extends ('layouts.masteradmin')
@section('title',"RoomFinder-Admin-Forum-Answers")
@section('content-section')

<div class="container" style="margin-top: 10px;">
    <div class="row">
         @include('success_message')
        @if(count($answers)==0)
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                <h1 class="btn btn-danger">Oops!You have not replied any questions yet</h1>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        @else
            @foreach($answers as $singlequestion)
        <table class="forumtable">

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
            <tr><td colspan="2" style="background-color: inherit;"></td></tr>
            <tr><td colspan="2"><strong>Your Answer</strong></td></tr>
            <tr>
                <td class="title" >{{$singlequestion->answer}}</td>
                <td class="title2" style="color:#ff8e27;" >Replied by:{{$singlequestion->replied_by}}<br/>
                    Replied On:{{$singlequestion->ac}}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="{{route('admin.editanswer',[$singlequestion->aid])}}"><span class="btn btn-success">Edit</span></a>
                        <a href="{{route('admin.deleteanswer',[$singlequestion->aid])}}"><span class="btn btn-danger" onclick="return confirm('Are you sure want to delete this answer')">Delete</span></a>
                    </td>
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