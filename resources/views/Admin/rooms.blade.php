 @extends ('layouts.masteradmin')
 @section('title',"RoomFinder-Admin-Rooms")
 @section('content-section')

 <div class="container" style="margin-top: 10px;">
  <div class="row">
     @include('success_message')
    @if(count($rooms)==0)
    <div class="col-md-6 col-md-offset-3">
      <div class="text-center">
        <h1 class="btn btn-danger">Oops! No room available now</h1>
      </div>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    @else
    @foreach($rooms as $singleroom)
    <div class="col-md-6 col-sm-8">
      <div class="grid" >
        <figure class="effect-ming">
         <img  class="img-responsive" src="{{asset('image/uploads/rooms/'.$singleroom->image)}}">
         <figcaption>
          <h3> {{$singleroom->no_of_rooms}} room available  at  {{$singleroom->location}} </h3><br/>
          <p class="links">
            <span>Rs {{$singleroom->price}} for {{$singleroom->no_of_rooms}} room</span><br>
            <span>Water:{{$singleroom->water_facility}}<br/>Parking:{{$singleroom->parking}}<br/>Location:{{$singleroom->location}}
            </span><br/>
            <span>Owner:{{$singleroom->owner_first_name}} {{$singleroom->owner_last_name}}<br/>
              Email:{{$singleroom->email}}<br/>
              Phone:{{$singleroom->phone}}<br/>
              Publish on:{{$singleroom->updated_at}}</span><br/>
            </p>
          </figcaption>
        </figure>
      </div>
    </div>
    @endforeach
    @endif

    <div class="col-md-6 col-md-offset-3">
      <div class="text-center"> 
        {{$rooms->links()}}
      </div>
    </div>
  </div>
</div>


@endsection