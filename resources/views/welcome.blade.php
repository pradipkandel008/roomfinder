
<!DOCTYPE html>
<html>
<head>
</head>
<body>
@extends ('layouts.master')
@section('title',"RoomFinder-Home")
@section('content-section')

<div class="container" style="margin-top:0px;">
	<div class="row">
		<div class="col-lg-12">

			<!-- Slider -->
			<div id="main-slider" class="main-slider flexslider">
				<ul class="slides">
					@foreach($home as $singleroom)
					<li>
						<img  src="{{asset('image/uploads/rooms/'.$singleroom->image)}}" height=500px width=600px/>
						<div class="flex-caption">
							<h3 style="color:white;">{{$singleroom->no_of_rooms}} room available  at  {{$singleroom->location}} </h3>
							<p>Price:Rs {{$singleroom->price}}</p>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
</body>
</html>

