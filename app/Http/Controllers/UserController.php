<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Roommate;
use App\Bookroom;
use Auth;
use App\Feedback;
use App\Question;
use App\Answer;
use App\Notification;
use App\User;
use App\Http\Requests\FeedbackValidation;
use App\Http\Requests\AccountUpdateValidation;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }

     public function showRoom(){
        $rooms=Room::orderBy('id','desc')
            ->where('status','=','1')
            ->where('availability','=','1')
            ->paginate(4);
        return view('user.rooms',['rooms'=>$rooms ]);
    }

    public function showRoommateRegisterForm(){
        return view('user.addroommates');
    }

    public function showRoommates(){
        $roommates=Roommate::orderBy('id','desc')
            ->where('status','=','1')
            ->where('availability','=','1')
            ->where('added_by','<>',Auth::user()->email)
            ->paginate(4);
        return view('user.roommates',['roommates'=>$roommates ]);
    }

    public function showMyRoommates(){
        $roommates=Roommate::orderby('id','desc')
            ->where('added_by','=',Auth::user()->email)
            ->where('status','=','1')
            ->where('availability','=','1')
            ->paginate(4);
        return view('user.myroommates',['roommates'=>$roommates]);
    }

    public function editRoommate($id){
        $roommate=Roommate::find($id);
        return view('user.editroommates',compact('roommate'));
    }

    public function bookRoom($id){
        $room=room::find($id);
        return view ('user.bookroomform',compact('room'));
    }

    public function myBookings(){
        $rooms =Room::orderby('bookrooms.id','desc')
            ->join('bookrooms', 'rooms.id', '=', 'bookrooms.room_id')
            ->select('rooms.id as rid','rooms.price','rooms.no_of_rooms','rooms.location','rooms.owner_first_name',
                'rooms.owner_last_name','rooms.parking',
                'rooms.water_facility','rooms.email','rooms.phone','rooms.image',
                'bookrooms.id','bookrooms.created_at','bookrooms.status')
            ->where('bookrooms.booked_by','=',Auth::user()->email)
            ->where('bookrooms.status','=',1)
            ->paginate(4);
        return view('user.mybookings',['rooms'=>$rooms]);
    }
    public function acceptRoommate($id){
        $roommate=roommate::find($id);
        return view ('user.acceptroommate',compact('roommate'));
    }

    public function myAcceptedRequests(){
        $roommates =Roommate::orderby('acceptrequests.id','desc')
            ->join('acceptrequests', 'roommates.id', '=', 'acceptrequests.roommate_id')
            ->select('roommates.id as rid','roommates.gender','roommates.no_of_rooms','roommates.location','roommates.first_name',
                'roommates.last_name','roommates.parking','roommates.dob','roommates.marital_status','roommates.occupation',
                'roommates.water_facility','roommates.email','roommates.phone','roommates.image',
                'acceptrequests.id','acceptrequests.created_at','acceptrequests.status')
            ->where('acceptrequests.accepted_by','=',Auth::user()->email)
            ->where('acceptrequests.status','=',1)
            ->paginate(4);
        return view('user.myacceptedroommate',['roommates'=>$roommates]);
    }

    public function mineAcceptedRequests(){
        $roommates =Roommate::orderby('acceptrequests.id','desc')
            ->join('acceptrequests', 'roommates.id', '=', 'acceptrequests.roommate_id')
            ->select('roommates.location as rl','roommates.first_name as rfn','roommates.last_name as rln','acceptrequests.*')
            ->where('roommates.added_by','=',Auth::user()->email)
            ->where('acceptrequests.status','=',1)
            ->paginate(4);
        return view('user.mineacceptedroommate',['roommates'=>$roommates]);
    }

    public function feedback(FeedbackValidation $request){
        Feedback::create([
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'feedback'=>$request->get('feedback'),
            'website'=>$request->get('website'),
        ]);
        return redirect()->back()->with(['success_message'=>'Feedback posted successfully']);
    }


    public function askQuestion(){
        return view('user.askquestion');
    }

    public function storeQuestion(Request $request){
        Question::create([
            'title'=>$request->get('title'),
            'question'=>$request->get('question'),
            'asked_by'=>Auth::user()->user_name,
        ]);
        return redirect()->back()->with(['success_message'=>'Question posted successfully']);
    }

    public function showForum(){
        $questions=Question::orderBy('id','desc')
            ->where('status','=','1')
            ->paginate(10);
        return view('user.forum',['questions'=>$questions ]);
    }

    public function replyAnswer($id){
        $question=Question::find($id);
        return view ('user.replyanswer',compact('question'));
    }

    public function storeAnswer(Request $request, $id){
        Answer::create([
            'answer'=>$request->get('answer'),
            'replied_by'=>Auth::user()->user_name,
            'question_id'=>$id,
        ]);
        return redirect()->back()->with(['success_message'=>'Answer posted successfully']);
    }
    public function showAnswers($id){
        $answers =Answer::orderby('answers.id','desc')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->select('questions.id as qid','questions.title','questions.question','questions.asked_by','questions.created_at as qc',
                'answers.id as aid','answers.answer',
                'answers.replied_by', 'answers.status','questions.status','answers.created_at as ac')
            ->where('questions.status','=',1)
            ->where('answers.status','=',1)
            ->where('questions.id','=',$id)
            ->paginate(10);

        $questions=Question::orderby('questions.id','desc')
            ->select('questions.id as qid','questions.title','questions.question','questions.asked_by','questions.created_at as qc')
            ->where('questions.status','=',1)
            ->where('questions.id','=',$id)
            ->paginate(1);

        return view('user.answers',['answers'=>$answers,'questions'=>$questions]);
    }

    public function myQuestions(){
        $questions=Question::orderBy('id','desc')
            ->where('status','=','1')
            ->where('asked_by','=',Auth::user()->user_name)
            ->paginate(10);
        return view('user.myquestions',['questions'=>$questions ]);
    }

    public function myAnswers(){
        $answers =Answer::orderby('answers.id','desc')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->select('questions.id as qid','questions.title','questions.question','questions.asked_by','questions.created_at as qc',
                'answers.id as aid','answers.answer','answers.id as aid',
                'answers.replied_by', 'answers.status','questions.status','answers.created_at as ac')
            ->where('questions.status','=',1)
            ->where('answers.status','=',1)
            ->where('replied_by','=',Auth::user()->user_name)
            ->paginate(5);

        return view('user.myanswers',['answers'=>$answers]);
    }

    public function editQuestion($id){
        $question=Question::find($id);
        return view('user.editquestion',compact('question'));
    }

    public function updateQuestion(Request $request,$id){
        $question=Question::find($id);
        $question->update([
            'title'=>$request->get('title'),
            'question'=>$request->get('question'),
            'asked_by'=>Auth::user()->user_name,
        ]);
        if(!$question){
            return redirect()->back()->with(['success_message'=>'Question Could not be Updated']);
        }
        $request->session()->flash('success_message',"Question updated Successfully");
        return redirect()->route('user.myquestions');
    }

    public function deleteQuestion(Request $request, $id){
        $question=Question::find($id);
        $question->status=0;
        $question->update([
            'status'=>$question->status,
        ]);
        if(!$question){
            return redirect()->back()->with(['success_message'=>'Question delete failed']);
        }
        return redirect()->back()->with(['success_message'=>'Question deleted successfully']);
    }

    public function editAnswer($id){
        $answer=Answer::find($id);
        $question=Question::orderby('questions.id','desc')
            ->join ('answers','answers.question_id','=','questions.id')
            ->select('questions.id as qid','questions.title','questions.question','questions.asked_by','questions.created_at as qc')
            ->where('questions.status','=',1)
            ->where('answers.id','=',$id)
            ->paginate(1);

        return view('user.editanswer',compact('answer','question'));
    }

    public function updateAnswer(Request $request,$id){
        $answer=Answer::find($id);
        $answer->update([
            'title'=>$request->get('title'),
            'answer'=>$request->get('answer'),
            'asked_by'=>Auth::user()->user_name,
        ]);
        if(!$answer){
            return redirect()->back()->with(['success_message'=>'Answer Could not be updated']);
        }
        $request->session()->flash('success_message',"Answer updated Successfully");
        return redirect()->route('user.myanswers');
    }

    public function deleteAnswer(Request $request, $id){
        $answer=Answer::find($id);
        $answer->status=0;
        $answer->update([
            'status'=>$answer->status,
        ]);
        if(!$answer){
            return redirect()->back()->with(['success_message'=>'Answer delete failed']);
        }
        return redirect()->back()->with(['success_message'=>'Answer deleted successfully']);
    }

    public function about(){
        return view('user.aboutus');
    }

     public function account(){
        $user=User::find(Auth::user()->id);
        return view('user.account',compact('user'));
    }

     public function accountUpdate(AccountUpdateValidation $request){
        $user=User::find(Auth::user()->id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/users',$image);
            //remove old image
            if($user->image){
                unlink('image/uploads/users/'.$user->image);
            }
            $user->image=$image;
        }
        $user->update([
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'image'=>$user->image,
            'password'=>bcrypt($request->get('password')),
             ]);

        if(!$user){
            $request->session()->flash('success_message','Account Update Failed.');
        }
        $request->session()->flash('success_message','Account Updated Successfully.');
        return redirect()->route('user.account');
    }

    public function showRoomSearchForm(){
        return view('user.searchrooms');
    }

    public function showRoommateSearchForm(){
        return view('user.searchroommates');
    }
}
