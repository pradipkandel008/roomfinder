<?php

namespace App\Http\Controllers;

use App\Notifications\BookedRoomNotification;
use App\Notifications\CancelledBookedRoomNotification;
use Carbon\Carbon;
use App\Http\Requests\BookRoomAcceptRequestValidation;
use Illuminate\Http\Request;
use App\Room;
use App\Bookroom;
use Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\RoomRegisterValidation;
use App\Http\Requests\RoomUpdateValidation;
class RoomController extends Controller
{
  public function slider(){
    $rooms=Room::orderBy('id','desc')->paginate(5);
    return view ('welcome',['home'=>$rooms]);
}

    public function store(RoomRegisterValidation $request){
        $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName(); 
            $file->move('image/uploads/rooms',$image);
        }

        Room::create([
            'owner_first_name'=>$request->get('owner_first_name'),
            'owner_last_name'=>$request->get('owner_last_name'),
            'price'=>$request->get('price'),
            'no_of_rooms'=>$request->get('no_of_rooms'),
            'location'=>$request->get('location'),
            'water_facility'=>$request->get('water_facility'),
            'parking'=>$request->get('parking'),
            'image'=>$image,
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'added_by'=>$request->get('user'),
        ]);
        $request->session()->flash('success_message','Room Registered Successfully.');
        return redirect()->route('owner.roomregister');

    }

    public function storeAdmin(RoomRegisterValidation $request){
        $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/rooms',$image);
        }

        Room::create([
            'owner_first_name'=>$request->get('owner_first_name'),
            'owner_last_name'=>$request->get('owner_last_name'),
            'price'=>$request->get('price'),
            'no_of_rooms'=>$request->get('no_of_rooms'),
            'location'=>$request->get('location'),
            'water_facility'=>$request->get('water_facility'),
            'parking'=>$request->get('parking'),
            'image'=>$image,
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'added_by'=>$request->get('user'),
        ]);
        $request->session()->flash('success_message','Room Registered Successfully.');
        return redirect()->route('admin.roomregister');

    }

    public function updateRoom(RoomUpdateValidation $request, $id){
        $room=Room::find($id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/rooms',$image);

            //remove old image
            if($room->image){
                unlink('image/uploads/rooms/'.$room->image);
            }
            $room->image=$image;
        }

        $room->update([
            'owner_first_name'=>$request->get('owner_first_name'),
            'owner_last_name'=>$request->get('owner_last_name'),
            'price'=>$request->get('price'),
            'no_of_rooms'=>$request->get('no_of_rooms'),
            'location'=>$request->get('location'),
            'water_facility'=>$request->get('water_facility'),
            'parking'=>$request->get('parking'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'added_by'=>$request->get('user'),
            'image'=>$room->image,
        ]);
        if(!$room){
            $request->session()->flash('success_message','Room Update Failed.');
        }
        $request->session()->flash('success_message','Room Updated Successfully.');
        return redirect()->route('owner.room.edit',$id);
    }

    public function deleteRoom(Request $request, $id){
        $room=Room::find($id);
        $room->status=0;
        $room->update([
            'status'=>$room->status,
        ]);
        if(!$room){
            $request->session()->flash('success_message','Room Delete Failed.');
        }
        $request->session()->flash('success_message','Room Deleted Successfully.');
        return redirect()->route('owner.myrooms');
    }

    public function bookRoom(BookRoomAcceptRequestValidation $request, $id){
        $requests=Room::find($id);
        $when=Carbon::now()->addSeconds(10);
        $requests->notify((new BookedRoomNotification)->delay($when));
        if($requests){
        $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/bookedrooms',$image);
        }
        Bookroom::create([
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'dob'=>$request->get('dob'),
            'marital_status'=>$request->get('marital_status'),
            'occupation'=>$request->get('occupation'),
            'image'=>$image,
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'booked_by'=>$request->get('user'),
            'room_id'=>$request->get('room_id'),
        ]);

        $room=Room::find($id);
        $room->availability=0;
        $room->update([
            'availability'=>$room->availability,
        ]);
        if(!$room){
            return redirect()->back()->with(['success_message'=>'Sorry, this room could not be booked']);
        }

        $request->session()->flash('success_message',"Room Booked Successfully.For further information,please contanct room's owner");
        return redirect()->route('user.mybookings');
        }
    }

    public function cancelBookings(Request $request,$id,$rid){
        $requests=Room::find($rid);
        $when=Carbon::now()->addSeconds(10);
        $requests->notify((new CancelledBookedRoomNotification)->delay($when));
        if($requests) {
            $bookroom = Bookroom::find($id);
            $bookroom->status = 0;
            $bookroom->update([
                'status' => $bookroom->status,
            ]);
            $room = Room::find($rid);
            $room->availability = 1;
            $room->update([
                'availability' => $room->availability,
            ]);
            if (!$room) {
                return redirect()->back()->with(['success_message' => 'Sorry, Your booking could not be cancelled']);
            }
            $request->session()->flash('success_message', "Your booking has been cancelled successfully");
            return redirect()->route('user.mybookings');
        }
    }

    public function updateRoomAdmin(RoomUpdateValidation $request, $id){
        $room=Room::find($id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/rooms',$image);

            //remove old image
            if($room->image){
                unlink('image/uploads/rooms/'.$room->image);
            }
            $room->image=$image;
        }

        $room->update([
            'owner_first_name'=>$request->get('owner_first_name'),
            'owner_last_name'=>$request->get('owner_last_name'),
            'price'=>$request->get('price'),
            'no_of_rooms'=>$request->get('no_of_rooms'),
            'location'=>$request->get('location'),
            'water_facility'=>$request->get('water_facility'),
            'parking'=>$request->get('parking'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'added_by'=>$request->get('user'),
            'image'=>$room->image,
        ]);
        if(!$room){
            $request->session()->flash('success_message','Room Update Failed.');
        }
        $request->session()->flash('success_message','Room Updated Successfully.');
        return redirect()->route('admin.room.edit',$id);
    }

    public function deleteRoomAdmin(Request $request, $id){
        $room=Room::find($id);
        $room->status=0;
        $room->update([
            'status'=>$room->status,
        ]);
        if(!$room){
            $request->session()->flash('success_message','Room Delete Failed.');
        }
        $request->session()->flash('success_message','Room Deleted Successfully.');
        return redirect()->route('admin.myrooms');
    }

    public function searchRoom(Request $request){
        $category=$request->get('category');
        $search=$request->get('search');

        if($category=='Location'){
            $rooms=Room::orderby('id','desc')->where('rooms.location','like','%'.$search.'%')->paginate(4);
            return view('user.searchroomsresult',['rooms'=>$rooms]);
        }
        if($category=='Price'){
            $rooms=Room::orderby('id','desc')->where('rooms.price','like','%'.$search.'%')->paginate(4);
            return view('user.searchroomsresult',['rooms'=>$rooms]);
        }
        if($category=='No of rooms'){
            $rooms=Room::orderby('id','desc')->where('rooms.no_of_rooms','like','%'.$search.'%')->paginate(4);
            return view('user.searchroomsresult',['rooms'=>$rooms]);
        }

        if($category=='Water facility'){
            $rooms=Room::orderby('id','desc')->where('rooms.water_facility','like','%'.$search.'%')->paginate(4);
            return view('user.searchroomsresult',['rooms'=>$rooms]);
        }

        if($category=='Parking'){
            $rooms=Room::orderby('id','desc')->where('rooms.parking','like','%'.$search.'%')->paginate(4);
            return view('user.searchroomsresult',['rooms'=>$rooms]);
        }

    }
}

