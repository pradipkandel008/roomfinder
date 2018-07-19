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
@extends ('layouts.masterowner')
@section('title',"RoomFinder-Owner-Reply answer")
@section('content-section')
<div class="container">
    <div class="row">
        @include('success_message')
        <table class="forumtable">
            <tr>
                <td class="title" style="color:red;font-size:20px">
                    Title: <strong>{{$question->title}}</strong>
                </td>
                <td class="title2" style="color:#ff8e27;">
                    Asked by:<strong>{{$question->asked_by}}</strong>
                </td>
            </tr>
            <tr>
                <td class="title">
                    Question: {{$question->question}}
                </td>
                <td class="title2" style="color:#ff8930;">
                    Asked on:{{$question->created_at}}
                </td>
            </tr>

        </table>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="panel-body">
                <form  class="form-horizontal" action="{{route('owner.replyanswer.submit',$question->id)}}" method="post">
                    {{csrf_field()}}

                    <strong>Answer</strong><br/>

                    <textarea name="answer" rows="5" cols="70" required></textarea><br/><br/>
                    <button type="submit" class="btn btn-primary">
                        Reply
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection