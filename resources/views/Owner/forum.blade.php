<style>

</style>
@extends ('layouts.masterowner')
@section('title',"RoomFinder-Owner-Forum")
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
                <td class="title" style="color:red;font-size:20px;margin-left: 5px;">
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
            <a href="{{route('owner.replyanswer',$singlequestion->id)}}"><span class="btn btn-success">Reply</span></a>
            <a href="{{route('owner.showanswers',$singlequestion->id)}}"><span class="btn btn-info">View all replies</span></a>
        </td>
    </tr>
   <tr></tr>

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