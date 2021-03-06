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
@section('title',"RoomFinder-Admin-Myquestions")
@section('content-section')
<div class="container">
    <div class="row">
         @include('success_message')
        @if(count($questions)==0)
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                <h1 class="btn btn-danger">Oops! No questions posted yet</h1>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        @else


            @foreach($questions as $singlequestion)
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
                    Asked on:{{$singlequestion->created_at}}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="{{route('admin.replyanswer',$singlequestion->id)}}"><span class="btn btn-success">Reply</span></a>
                    <a href="{{route('admin.showanswers',$singlequestion->id)}}"><span class="btn btn-info">View all replies</span></a>
                    <a href="{{route('admin.editquestion',$singlequestion->id)}}"><span class="btn btn-success">Edit</span></a>
                    <a href="{{route('admin.deletequestion',$singlequestion->id)}}"><span class="btn btn-danger"
                       onclick="return confirm('Are you sure want to delete this question?')">Delete</span></a>
                   </td>
                   </tr>

               </table>
            @endforeach
               @endif
           </div>


           <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                {{$questions->links()}}
            </div>
        </div>
    </div>
    @endsection