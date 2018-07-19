<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Bootstrap  and css-->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.bxslider.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/style2.css')}}" />
  <link href="{{asset('css/overwrite.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('flexslider/flexslider.css')}}" rel="stylesheet"/>
  
</head>

<body>
  
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
     <a class="navbar-brand" href="/"><img src="{{asset('image/logo.png')}}" width=80 ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
       <li ><a href="/" style="color:white;"><span class="glyphicon glyphicon-home">&nbsp;Home</span></a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;"><span class="glyphicon glyphicon-user">&nbsp;Register</span>  <span class="caret"></span></a>
        <ul class="dropdown-menu">
                <li><a href="{{route('user.register')}}">User Register</a></li>
                <li><a href="{{route('owner.register')}}">Owner Register</a></li>
                <li><a href="{{route('admin.register')}}">Admin Request</a></li>
        </ul>
      </li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;"><span class="glyphicon glyphicon-log-in">&nbsp;Login </span>  <span class="caret"></span></a>
        <ul class="dropdown-menu">
                <li><a href="{{route('user.login')}}">User Login</a></li>
                <li><a href="{{route('owner.login')}}">Owner Login</a></li>
                <li><a href="{{route('admin.login')}}">Admin Login</a></li>  
        </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>
         
  @yield('content-section')
  <br/>

<div class="container">
<div class="row" style="background-image: linear-gradient(#0a7b0e,#2ea307)">
  <div class="col-md-12">
    <div class="text-center">
      <h1 style="color:white;">What Can You Do?</h1>

  </div>
  </div>
</div>
  <div class="row" style="background-image: linear-gradient(#05b440, #4dbbc0)">
    <div class="col-md-6">
      <div class="text" style="color:white;">
      <h2 style="color:white;">User</h2>

      </div>
      <div class="owner" style="color:white;">
      <li style="list-style: none;"><img src="{{asset('image/booking.png')}}" width='100px'>  Book Rooms</li>
      <li style="list-style: none;"><img src="{{asset('image/accept1.png')}}" width='100px' style="border-radius: 50px;">  Accept Roommate Request</li>
      <li style="list-style: none;"><img src="{{asset('image/add.png')}}" width='100px'>Post Roommate Request</li>
      <li style="list-style: none;"><img src="{{asset('image/forum.png')}}" width='100px'  style="border-radius: 50px;">  Access Discussion Forum</li>
      <li style="list-style: none;"><img src="{{asset('image/feedback.png')}}" width='100px'>Post Feedback</li>
      </div>


    </div>
    <div class="col-md-6">
      <div class="text" style="color:white;">
      <h2 style="color:white;">Owner</h2>
      </div>
      <div class="owner" style="color:white;">
      <li style="list-style: none;"><img src="{{asset('image/ad.png')}}" width='100px'  style="border-radius: 50px;">Advertise Your Rooms</li>
      <li style="list-style: none;"><img src="{{asset('image/view.png')}}" width='100px'>View Booking of Your Rooms</li>
      <li style="list-style: none;"><img src="{{asset('image/forum.png')}}" width='100px'  style="border-radius: 50px;"> Access Discussion Forum</li>
      <li style="list-style: none;"><img src="{{asset('image/feedback.png')}}" width='100px'>Post Feedback</li>
    </div>
    </div>
  </div>
<br/>
<hr/>
  <footer>
    <div class="inner-footer">

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

