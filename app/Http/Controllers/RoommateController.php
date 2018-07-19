<?php

namespace App\Http\Controllers;

use App\Notifications\AcceptRoommateRequestNotification;
use App\Notifications\CancelledAcceptedRoommateRequestNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Roommate;
use App\Http\Requests\RoommateRegisterValidation;
use App\Http\Requests\RoommateUpdateValidation;
use App\Http\Requests\BookRoomAcceptRequestValidation;
use App\Acceptrequest;
use App\User;
use Auth;

class RoommateController extends Controller
{
      public function store(RoommateRegisterValidation $request){
        $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName(); 
            $file->move('image/uploads/roommates',$image);
        }

        Roommate::create([
        	'location'=>$request->get('location'),
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'dob'=>$request->get('dob'),
            'marital_status'=>$request->get('marital_status'),
            'occupation'=>$request->get('occupation'),
            'no_of_rooms'=>$request->get('no_of_rooms'),
            'water_facility'=>$request->get('water_facility'),
            'parking'=>$request->get('parking'),
            'image'=>$image,
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'added_by'=>$request->get('user'),
        ]);
        $request->session()->flash('success_message','Roommate Request Registered Successfully.');
        return redirect()->route('user.showRoommates');

        }

    public function updateRoommate(RoommateUpdateValidation $request, $id){
        $roommate=Roommate::find($id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/roommates',$image);
            //remove old image
            if($roommate->image){
                unlink('image/uploads/roommates/'.$roommate->image);
            }
            $roommate->image=$image;
        }
        $roommate->update([
            'location'=>$request->get('location'),
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'dob'=>$request->get('dob'),
            'marital_status'=>$request->get('marital_status'),
            'occupation'=>$request->get('occupation'),
            'no_of_rooms'=>$request->get('no_of_rooms'),
            'water_facility'=>$request->get('water_facility'),
            'parking'=>$request->get('parking'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'added_by'=>$request->get('user'),
            'image'=>$roommate->image,
        ]);
        if(!$roommate){
            $request->session()->flash('success_message','Roommate Update Failed.');
        }
        $request->session()->flash('success_message','Roommate Request Updated Successfully.');
        return redirect()->route('user.roommate.edit',$id);
    }


    public function deleteRoommate(Request $request, $id){
        $roommate=Roommate::find($id);
        $roommate->status=0;
        $roommate->update([
            'status'=>$roommate->status,
        ]);
        if(!$roommate){
            $request->session()->flash('success_message','Roommate Request Delete Failed.');
        }
        $request->session()->flash('success_message','Roommate Request Deleted Successfully.');
        return redirect()->route('user.myroommates');
    }


    public function acceptRoommate(BookRoomAcceptRequestValidation $request, $id){
        
        $requests=Roommate::find($id);
        $when=Carbon::now()->addSeconds(10);
        $requests->notify((new AcceptRoommateRequestNotification)->delay($when));

        if($requests){
        $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/acceptedroommates',$image);
        }
        Acceptrequest::create([
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'dob'=>$request->get('dob'),
            'marital_status'=>$request->get('marital_status'),
            'occupation'=>$request->get('occupation'),
            'image'=>$image,
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'accepted_by'=>$request->get('user'),
            'roommate_id'=>$request->get('roommate_id'),
        ]);

        $roommate=Roommate::find($id);
        $roommate->availability=0;
        $roommate->update([
            'availability'=>$roommate->availability,
        ]);
        if(!$roommate){
            return redirect()->back()->with(['success_message'=>'Roommate Request Could not be accepted.']);
        }
        $request->session()->flash('success_message',"Roommate Request Accepted Successfully.For further information,please contact roommate you accepted");
        return redirect()->route('user.myacceptedrequest');
         }
     }


    public function cancelMyAcceptedRequests(Request $request,$id,$rid){
        
        $requests=Roommate::find($rid);
        $when=Carbon::now()->addSeconds(10);
        $requests->notify((new CancelledAcceptedRoommateRequestNotification)->delay($when));

        if($requests){
        $acceptrequest=Acceptrequest::find($id);
        $acceptrequest->status=0;
        $acceptrequest->update([
            'status'=>$acceptrequest->status,
        ]);

        $roommate=Roommate::find($rid);
        $roommate->availability=1;
        $roommate->update([
            'availability'=>$roommate->availability,
        ]);
        if(!$roommate){
            return redirect()->back()->with(['success_message'=>'Sorry, this accept could not be cancelled']);
        }

        $request->session()->flash('success_message',"Your accepted roommate request has been cancelled successfully");
        return redirect()->route('user.myacceptedrequest');

        }
    }

    public function storeAdmin(RoommateRegisterValidation $request){
        $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/roommates',$image);
        }

        Roommate::create([
            'location'=>$request->get('location'),
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'dob'=>$request->get('dob'),
            'marital_status'=>$request->get('marital_status'),
            'occupation'=>$request->get('occupation'),
            'no_of_rooms'=>$request->get('no_of_rooms'),
            'water_facility'=>$request->get('water_facility'),
            'parking'=>$request->get('parking'),
            'image'=>$image,
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'added_by'=>$request->get('user'),
        ]);
        $request->session()->flash('success_message','Roommate Request Registered Successfully.');
        return redirect()->route('admin.showRoommates');
    }
    public function updateRoommateAdmin(RoommateUpdateValidation $request, $id){
        $roommate=Roommate::find($id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/roommates',$image);

            //remove old image
            if($roommate->image){
                unlink('image/uploads/roommates/'.$roommate->image);
            }
            $roommate->image=$image;
        }

        $roommate->update([
            'location'=>$request->get('location'),
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'dob'=>$request->get('dob'),
            'marital_status'=>$request->get('marital_status'),
            'occupation'=>$request->get('occupation'),
            'no_of_rooms'=>$request->get('no_of_rooms'),
            'water_facility'=>$request->get('water_facility'),
            'parking'=>$request->get('parking'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'added_by'=>$request->get('user'),
            'image'=>$roommate->image,
        ]);
        if(!$roommate){
            $request->session()->flash('success_message','Roommate Update Failed.');
        }
        $request->session()->flash('success_message','Roommate Request Updated Successfully.');
        return redirect()->route('admin.roommate.edit',$id);
    }


    public function deleteRoommateAdmin(Request $request, $id){
        $roommate=Roommate::find($id);
        $roommate->status=0;
        $roommate->update([
            'status'=>$roommate->status,
        ]);
        if(!$roommate){
            $request->session()->flash('success_message','Roommate Request Delete Failed.');
        }
        $request->session()->flash('success_message','Roommate Request Deleted Successfully.');
        return redirect()->route('admin.myroommates');
    }

    public function searchRoommate(Request $request){
        $category=$request->get('category');
        $search=$request->get('search');

        if($category=='Location'){
            $roommates=Roommate::orderby('id','desc')->where('roommates.location','like','%'.$search.'%')->paginate(4);
            return view('user.searchroommatesresult',['roommates'=>$roommates]);
        }

        if($category=='No of rooms'){
            $roommates=Roommate::orderby('id','desc')->where('roommates.no_of_rooms','like','%'.$search.'%')->paginate(4);
            return view('user.searchroommatesresult',['roommates'=>$roommates]);
        }

        if($category=='Water facility'){
            $roommates=Roommate::orderby('id','desc')->where('roommates.water_facility','like','%'.$search.'%')->paginate(4);
            return view('user.searchroommatesresult',['roommates'=>$roommates]);
        }

        if($category=='Parking'){
            $roommates=Roommate::orderby('id','desc')->where('roommates.parking','like','%'.$search.'%')->paginate(4);
            return view('user.searchroommatesresult',['roommates'=>$roommates]);
        }

        if($category=='Gender'){
            $roommates=Roommate::orderby('id','desc')->where('roommates.gender','like','%'.$search.'%')->paginate(4);
            return view('user.searchroommatesresult',['roommates'=>$roommates]);
        }
        if($category=='Occupation'){
            $roommates=Roommate::orderby('id','desc')->where('roommates.occupation','like','%'.$search.'%')->paginate(4);
            return view('user.searchroommatesresult',['roommates'=>$roommates]);
        }

        if($category=='Marital status'){
            $roommates=Roommate::orderby('id','desc')->where('roommates.marital_status','like','%'.$search.'%')->paginate(4);
            return view('user.searchroommatesresult',['roommates'=>$roommates]);
        }


    }


}
