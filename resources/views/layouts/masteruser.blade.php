<!DOCTYPE html>
<html lang="en">

<head>
  <style>
  .navbar-inverse .navbar-nav>li.active>a{
    color: #aaa;
    background-color: #080808;
  }
</style>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>

<!-- Bootstrap  and css-->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
<!--<link rel="stylesheet" href="{{asset('css/jquery.bxslider.css')}}">-->
<link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/style2.css')}}" />
<link href="{{asset('css/overwrite.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link href="{{asset('flexslider/flexslider.css')}}" rel="stylesheet"/>

</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>
        <a class="navbar-brand" href="/user"><img src="{{asset('image/logo.png')}}" width=80 ></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="{{Request::is('user','user/rooms')?'active':''}}"><a href="{{route('user.showroom')}}" style="color:white;">Rooms</a></li>
          <li class="{{Request::is('user/roommates')?'active':''}}"><a href="{{route('user.showRoommates')}}" style="color:white;">RoomMates</a></li>
          <li class="{{Request::is('user/forum')?'active':''}}"><a href="{{route('user.showforum')}}" style="color:white;">Forum</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;">
                    Search</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('user.showroomsearchform')}}">Rooms</a></li>
                    <li><a href="{{route('user.showroommatesearchform')}}">Roommates</a></li>

                </ul>
            </li>
          <li class="{{Request::is('user/about')?'active':''}}"><a href="{{route('user.about')}}" style="color:white;">About Us</a></li>
        </ul>
        <li class="dropdown nav navbar-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;">
                <image class="userprofile" height='70px' width='70px' src="{{asset('image/uploads/users/'.Auth::user()->image)}}" style="border-radius: 50px;">{{Auth::user()->user_name}} </span>  <span class="caret"></span></a>
          <ul class="dropdown-menu">

           <li><a href="{{route('user.roommateregister')}}">Add Roommate Requests </a></li>
           <li><a href="{{route('user.mybookings')}}">My Bookings</a></li>
           <li><a href="{{route('user.myroommates')}}">My Roommate Requests</a></li>
           <li><a href="{{route('user.myacceptedrequest')}}">Roommate Requests I accepted</a></li>
           <li><a href="{{route('user.mineacceptedrequest')}}">Roommate Requests Mine accepted</a></li>
           <li><a href="{{route('user.askquestion')}}">Ask Questions</a></li>
           <li><a href="{{route('user.myquestions')}}">My Questions</a></li>
           <li><a href="{{route('user.myanswers')}}">My Answers</a></li>
           <li><a href="{{route('user.account')}}">Update account</a></li>
           <li><a href="{{route('user.logout')}}">Logout</a></li>
           <li><a href="{{asset('UserManual.pdf')}}" target="_blank">Help</a></li>
         </ul>
       </li>
     </div>
   </div>
 </nav>

 @yield('content-section')

 <br/>
 <hr/>
 <footer>
  <div class="inner-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4 f-about">
          <h3>RoomFinder is a fastest and easiest way of finding roooms and roommates. Become a member for free. </h3>
        </div>
        <div class="col-md-4 l-posts">

        </div>
        <div class="col-md-4 f-contact">
          <h3 class="widgetheading">Contact Details</h3>
          <p><i class="fa fa-envelope"></i> roomfinder@gmail.com</p>
          <p><i class="fa fa-phone"></i> +9779843624525</p>
          <p><i class="fa fa-home"></i> RoomFinder PO Box 46000 New Baneshwor, Kathmandu Nepal</p>
        </div>
      </div>
    </div>
  </div>


  <div class="last-div">
    <div class="container">
      <div class="row">
        <div class="copyright">
          &copy; RoomFinder. All Rights Reserved
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <ul class="social-network">
          <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
          <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
          <li><a href="#" data-placement="top" title="Instagram"><i class="fa fa-instagram fa-1x"></i></a></li>
        </ul>
      </div>
    </div>

    <a href="" class="scrollup"><i class="fa fa-chevron-up"></i></a>
  </div>
</footer>

<script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/fliplightbox.min.js')}}"></script>
<!--<script src="{{asset('js/functions.js')}}"></script>-->
<script src="{{asset('flexslider/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('flexslider/flexslider.config.js')}}"></script>
<script src="{{asset('js/animate.js')}}"></script>
</body>

</html>

