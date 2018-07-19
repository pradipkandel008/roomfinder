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
.forumtable>td{
    margin:20px;
}
</style>
@extends ('layouts.masteruser')
@section('title',"RoomFinder-User-Edit answer")
@section('content-section')
<div class="container">
    <div class="row">
       @include('validation-error-message')
       @include('success_message')
       <table class="forumtable">
        @foreach($question as $questions)
        <tr>
            <td class="title" style="color:red;font-size:20px">
                Title: <strong>{{$questions->title}}</strong>
            </td>
            <td class="title2" style="color:#ff8e27;">
                Asked by:<strong>{{$questions->asked_by}}</strong>
            </td>
        </tr>
        <tr>
            <td class="title">
                Question: {{$questions->question}}
            </td>
            <td class="title2" style="color:#ff8930;">
                Asked on:{{$questions->qc}}
            </td>
        </tr>
        @endforeach
    </table>
</div>
<div class="row">
    <div class="col-md-7">
    <form class="form-horizontal" action="{{route('user.updateanswer',$answer->id)}}" method="post">
        {{csrf_field()}}
        <div class="panel-body">

        <strong>Answer</strong><br/>

        <textarea name="answer" rows="5" cols="70" required>{{$answer->answer}}</textarea><br/><br/>
        <button type="submit" class="btn btn-primary">
         Update
     </button>
        </div>
 </form>
    </div>
</div>
</div>
@endsection