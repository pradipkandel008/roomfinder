@extends('layouts.masteradmin')
<style>
    .col-sm-3{
        background-image:linear-gradient(#1efff3, #07ff52);
        margin-left: 70px;
        margin-bottom: 10px;
        height:80px;
        text-transform: uppercase;
        color: #ff5b12;
        font-size: 20px;
        font-weight: bold;
        border:1px solid white;
    }
    .col-sm-3:hover{
        background-image:linear-gradient(#07ff52, #1efff3);
        border:2px solid red;
    }
</style>
@section('content-section')
<div class="container"  style="margin-top:10px;">
    <div class="row">
       <a href="{{route('admin.allrooms')}}"><div class="col-sm-3">
        Rooms <br/>
           Total:{{$rooms->count('id')}}
       </div></a>
       <a href="{{route('admin.allroommates')}}"><div class="col-sm-3">
            Roommate Requests<br/>
            Total:{{$roommates->count('id')}}
           </div></a>
        <a href="{{route('admin.allusers')}}"><div class="col-sm-3">
            Users<br/>
            Total:{{$users->count('id')}}
        </div></a>
    </div>
    <div class="row">
        <a href="{{route('admin.allbookedrooms')}}"><div class="col-sm-3">
                Booked Rooms<br/>
                Total:{{$bookedrooms->count('id')}}
            </div></a>
        <a href="{{route('admin.allacceptedroommates')}}"><div class="col-sm-3">
                Accepted Roommate Requests<br/>
                Total:{{$acceptedrequests->count('id')}}
            </div></a>
        <a href="{{route('admin.allowners')}}"><div class="col-sm-3">
            Owners<br/>
            Total:{{$owners->count('id')}}
        </div></a>


    </div>
    <div class="row">
        <a href="{{route('admin.allbookingcancelledrooms')}}">  <div class="col-sm-3">
                Booking Cancelled Rooms<br/>
                Total:{{$cancelledbookings->count('id')}}
            </div></a>
        <a href="{{route('admin.allcancelledacceptedrequests')}}"> <div class="col-sm-3">
                Cancelled Accepted Requests<br/>
                Total:{{$cancelledaccepts->count('id')}}
            </div></a>
        <a href="{{route('admin.alladmins')}}"><div class="col-sm-3">
                Admins<br/>
                Total:{{$admins->count('id')}}
            </div></a>

    </div>
    <div class="row">
        <a href="{{route('admin.alldeletedrooms')}}">  <div class="col-sm-3">
                Deleted Rooms<br/>
                Total:{{$deletedrooms->count('id')}}
            </div></a>
        <a href="{{route('admin.alldeletedroommaterequests')}}"> <div class="col-sm-3">
                Deleted Roommate Requests<br/>
                Total:{{$deletedrequests->count('id')}}
            </div></a>

        <a href="{{route('admin.alladminrequests')}}"><div class="col-sm-3">
                Admin Requests<br/>
                Total:{{$adminrequests->count('id')}}
            </div></a>

    </div>
    <div class="row">
        <a href="{{route('admin.allquestions')}}"><div class="col-sm-3">
                Questions<br/>
                Total:{{$questions->count('id')}}
            </div></a>
        <a href="{{route('admin.allanswers')}}"> <div class="col-sm-3">
                Answers<br/>
                Total:{{$answers->count('id')}}
            </div></a>

        <a href="{{route('admin.allapprovedadminrequests')}}">  <div class="col-sm-3">
            Approved Admins<br/>
            Total:{{$approvedadmins->count('id')}}
            </div></a>

    </div>
    <div class="row">

        <a href="{{route('admin.alldeletedquestions')}}"> <div class="col-sm-3">
            Deleted Questions<br/>
            Total:{{$deletedquestions->count('id')}}
            </div></a>
        <a href="{{route('admin.alldeletedanswers')}}"> <div class="col-sm-3">
            Deleted Answers<br/>
            Total:{{$deletedanswers->count('id')}}
            </div></a>
        <a href="{{route('admin.allfeedbacks')}}"><div class="col-sm-3">
                Feedbacks<br/>
                Total:{{$feedbacks->count('id')}}
            </div></a>

    </div>
</div>
@endsection
