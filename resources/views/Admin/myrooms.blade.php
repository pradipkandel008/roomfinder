 @extends ('layouts.masteradmin')
 @section('title',"RoomFinder-Admin-Rooms")
 @section('content-section')

<div class="container" style="margin-top: 10px;">
  <div class="row">
      @if(session()->has('success_message'))
          <div class="alert alert-info" style="margin-bottom: -10px;">
              <button type="button" class="close" data-dismiss="alert">
                  <i class="icon-remove"></i>
              </button>
              <strong>{!!session()->get('success_message')!!}</strong>
          </div>
      @endif
     @if(count($rooms)==0)
      <div class="col-md-6 col-md-offset-3">
        <div class="text-center">
          <h1 class="btn btn-danger">Oops! No room available</h1>
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
              <span>Water:{{$singleroom->water_facility}}<br/>Parking:{{$singleroom->parking}}<br/>
                </span><span>Location:{{$singleroom->location}}</span><br/>
                <span>Owner:{{$singleroom->owner_first_name}} {{$singleroom->owner_last_name}}<br/>
                  Email:{{$singleroom->email}}<br/>
                  Phone:{{$singleroom->phone}}<br/>
                  Publish on:{{$singleroom->updated_at}}</span><br/>
                <a href="{{route('admin.room.edit',[$singleroom->id])}}"><span class="btn btn-success">Edit</span></a>
              <a href="{{route('admin.room.delete',[$singleroom->id])}}"><span class="btn btn-danger" onclick="return confirm('Are you sure want to delete this room?')">Delete</span></a>
          
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