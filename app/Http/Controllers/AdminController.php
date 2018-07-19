<?php

namespace App\Http\Controllers;

use App\Notifications\ApproveRequestNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Roommate;
use App\Room;
use App\Question;
use App\Answer;
use App\User;
use App\Owner;
use App\Admin;
use App\Acceptrequest;
use App\Adminrequest;
use App\Bookroom;
use Auth;
use App\Feedback;
use App\Http\Requests\AccountUpdateValidation;
use Illuminate\Notifications\Notification;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::select('rooms.*')->where('status','=','1')->where('availability','=','1')->get();
        $roommates=Roommate::select('roommates.*')->where('status','=','1')->where('availability','=','1')->get();
        $users=User::select('users.*')->get();
        $owners=Owner::select('owners.*')->get();
        $admins=Admin::select('admins.*')->get();
        $adminrequests=Adminrequest::select('adminrequests.*')->where('status','=','1')->get();

        $bookedrooms=Room::select('rooms.*')->where('availability','=','0')->where('status','=','1')->get();
        $acceptedrequests=Roommate::select('roommates.*')->where('status','=','1')->where('availability','=','0')->get();

        $deletedrooms=Room::select('rooms.*')->where('status','=','0')->get();
        $deletedrequests=Roommate::select('roommates.*')->where('status','=','0')->get();

        $questions=Question::select('questions.*')->where('status','=','1')->get();
        $answers=Answer::select('answers.*')->where('status','=','1')->get();

        $deletedquestions=Question::select('questions.*')->where('status','=','0')->get();
        $deletedanswers=Answer::select('answers.*')->where('status','=','0')->get();

        $feedbacks=Feedback::select('feedbacks.*')->get();

        $cancelledbookings=Bookroom::select('bookrooms.*')->where('status','=','0')->get();
        $cancelledaccepts=Acceptrequest::select('acceptrequests.*')->where('status','=','0')->get();
        $approvedadmins=Adminrequest::select('adminrequests.*')->where('status','=','0')->get();

        return view('admin.home',['rooms'=>$rooms,'roommates'=>$roommates,'users'=>$users,
            'owners'=>$owners,
            'admins'=>$admins,
            'adminrequests'=>$adminrequests,
            'bookedrooms'=>$bookedrooms,
            'acceptedrequests'=>$acceptedrequests,
            'deletedrooms'=>$deletedrooms,
            'deletedrequests'=>$deletedrequests,
            'questions'=>$questions,
            'answers'=>$answers,
            'deletedquestions'=>$deletedquestions,
            'deletedanswers'=>$deletedanswers,
            'feedbacks'=>$feedbacks,
            'cancelledbookings'=>$cancelledbookings,
            'cancelledaccepts'=>$cancelledaccepts,
            'approvedadmins'=>$approvedadmins,
            ]);
    }

    public function showRoomRegisterForm()
    {
        return view('admin.addrooms');
    }

    public function showRoom()
    {
        $rooms = Room::orderBy('id', 'desc')
            ->where('status', '=', '1')
            ->where('availability', '=', '1')
            ->paginate(4);
        return view('admin.rooms', ['rooms' => $rooms]);
    }

    public function showRoommateRegisterForm()
    {
        return view('admin.addroommates');
    }

    public function showRoommates()
    {
        $roommates = Roommate::orderBy('id', 'desc')
            ->where('status', '=', '1')
            ->where('availability', '=', '1')
            ->where('added_by', '<>', Auth::user()->email)
            ->paginate(4);
        return view('admin.roommates', ['roommates' => $roommates]);
    }

    public function showMyRoommates()
    {
        $roommates = Roommate::orderby('id', 'desc')
            ->where('added_by', '=', Auth::user()->email)
            ->where('status', '=', '1')
            ->where('availability', '=', '1')
            ->paginate(4);
        return view('admin.myroommates', ['roommates' => $roommates]);
    }

    public function showMyRooms()
    {
        $rooms = Room::orderby('id', 'desc')
            ->where('added_by', '=', Auth::user()->email)
            ->where('status', '=', '1')
            ->where('availability', '=', '1')->paginate(4);
        return view('admin.myrooms', ['rooms' => $rooms]);
    }

    public function mineBookedRooms(){
        $rooms =Room::orderby('bookrooms.id','desc')
            ->join('bookrooms', 'rooms.id', '=', 'bookrooms.room_id')
            ->select('rooms.location as rl','rooms.no_of_rooms','bookrooms.*','rooms.owner_first_name as fn','rooms.owner_last_name as ln')
            ->where('rooms.added_by','=',Auth::user()->email)
            ->where('bookrooms.status','=',1)
            ->paginate(4);
        return view('admin.minebookedrooms',['rooms'=>$rooms]);
    }

    public function editRoom($id)
    {
        $room = Room::find($id);
        return view('admin.editrooms', compact('room'));
    }

    public function editRoommate($id)
    {
        $roommate = Roommate::find($id);
        return view('admin.editroommates', compact('roommate'));
    }

    public function mineAcceptedRequests()
    {
        $roommates = Roommate::orderby('acceptrequests.id', 'desc')
            ->join('acceptrequests', 'roommates.id', '=', 'acceptrequests.roommate_id')
            ->select('roommates.location as rl', 'roommates.first_name as rfn', 'roommates.last_name as rln', 'acceptrequests.*')
            ->where('roommates.added_by', '=', Auth::user()->email)
            ->where('acceptrequests.status', '=', 1)
            ->paginate(4);
        return view('admin.mineacceptedroommate', ['roommates' => $roommates]);
    }

    public function askQuestion()
    {
        return view('admin.askquestion');
    }

    public function storeQuestion(Request $request)
    {
        Question::create([
            'title' => $request->get('title'),
            'question' => $request->get('question'),
            'asked_by' => Auth::user()->user_name,
        ]);
        return redirect()->back()->with(['success_message' => 'Question posted successfully']);
    }

    public function showForum()
    {
        $questions = Question::orderBy('id', 'desc')
            ->where('status', '=', '1')
            ->paginate(10);
        return view('admin.forum', ['questions' => $questions]);
    }

    public function replyAnswer($id)
    {
        $question = Question::find($id);
        return view('admin.replyanswer', compact('question'));
    }

    public function storeAnswer(Request $request, $id)
    {
        Answer::create([
            'answer' => $request->get('answer'),
            'replied_by' => Auth::user()->user_name,
            'question_id' => $id,
        ]);
        return redirect()->back()->with(['success_message' => 'Answer posted successfully']);
    }

    public function showAnswers($id)
    {
        $answers = Answer::orderby('answers.id', 'desc')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->select('questions.id as qid', 'questions.title', 'questions.question', 'questions.asked_by', 'questions.created_at as qc',
                'answers.id as aid', 'answers.answer',
                'answers.replied_by', 'answers.status', 'questions.status', 'answers.created_at as ac')
            ->where('questions.status', '=', 1)
            ->where('answers.status', '=', 1)
            ->where('questions.id', '=', $id)
            ->paginate(10);

        $questions = Question::orderby('questions.id', 'desc')
            ->select('questions.id as qid', 'questions.title', 'questions.question', 'questions.asked_by', 'questions.created_at as qc')
            ->where('questions.status', '=', 1)
            ->where('questions.id', '=', $id)
            ->paginate(1);

        return view('admin.answers', ['answers' => $answers, 'questions' => $questions]);
    }

    public function myQuestions()
    {
        $questions = Question::orderBy('id', 'desc')
            ->where('status', '=', '1')
            ->where('asked_by', '=', Auth::user()->user_name)
            ->paginate(10);
        return view('admin.myquestions', ['questions' => $questions]);
    }

    public function myAnswers()
    {
        $answers = Answer::orderby('answers.id', 'desc')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->select('questions.id as qid', 'questions.title', 'questions.question', 'questions.asked_by', 'questions.created_at as qc',
                'answers.id as aid', 'answers.answer', 'answers.id as aid',
                'answers.replied_by', 'answers.status', 'questions.status', 'answers.created_at as ac')
            ->where('questions.status', '=', 1)
            ->where('answers.status', '=', 1)
            ->where('replied_by', '=', Auth::user()->user_name)
            ->paginate(5);

        return view('admin.myanswers', ['answers' => $answers]);
    }

    public function editQuestion($id)
    {
        $question = Question::find($id);
        return view('admin.editquestion', compact('question'));
    }

    public function updateQuestion(Request $request, $id)
    {
        $question = Question::find($id);
        $question->update([
            'title' => $request->get('title'),
            'question' => $request->get('question'),
            'asked_by' => Auth::user()->user_name,
        ]);
        if (!$question) {
            return redirect()->back()->with(['success_message' => 'Question Could not be Updated']);
        }
        $request->session()->flash('success_message', "Question updated Successfully");
        return redirect()->route('admin.myquestions');
    }

    public function deleteQuestion(Request $request, $id)
    {
        $question = Question::find($id);
        $question->status = 0;
        $question->update([
            'status' => $question->status,
        ]);
        if (!$question) {
            return redirect()->back()->with(['success_message' => 'Question delete failed']);
        }
        return redirect()->back()->with(['success_message' => 'Question deleted successfully']);
    }

    public function editAnswer($id)
    {
        $answer = Answer::find($id);
        $question = Question::orderby('questions.id', 'desc')
            ->join('answers', 'answers.question_id', '=', 'questions.id')
            ->select('questions.id as qid', 'questions.title', 'questions.question', 'questions.asked_by', 'questions.created_at as qc')
            ->where('questions.status', '=', 1)
            ->where('answers.id', '=', $id)
            ->paginate(1);

        return view('admin.editanswer', compact('answer', 'question'));
    }

    public function updateAnswer(Request $request, $id)
    {
        $answer = Answer::find($id);
        $answer->update([
            'title' => $request->get('title'),
            'answer' => $request->get('answer'),
            'asked_by' => Auth::user()->user_name,
        ]);
        if (!$answer) {
            return redirect()->back()->with(['success_message' => 'Answer Could not be updated']);
        }
        $request->session()->flash('success_message', "Answer updated Successfully");
        return redirect()->route('admin.myanswers');
    }

    public function deleteAnswer(Request $request, $id)
    {
        $answer = Answer::find($id);
        $answer->status = 0;
        $answer->update([
            'status' => $answer->status,
        ]);
        if (!$answer) {
            return redirect()->back()->with(['success_message' => 'Answer delete failed']);
        }
        return redirect()->back()->with(['success_message' => 'Answer deleted successfully']);
    }

    public function about()
    {
        return view('admin.aboutus');
    }

    public function account()
    {
        $user = Admin::find(Auth::user()->id);
        return view('admin.account', compact('user'));
    }

    public function accountUpdate(AccountUpdateValidation $request)
    {
        $user = Admin::find(Auth::user()->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = mt_rand(1001, 9999999) . '_' . $file->getClientOriginalName();
            $file->move('image/uploads/admins', $image);

            //remove old image
            if ($user->image) {
                unlink('image/uploads/admins/' . $user->image);
            }
            $user->image = $image;
        }


        $user->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'image' => $user->image,
            'password' => bcrypt($request->get('password')),
        ]);

        if (!$user) {
            $request->session()->flash('success_message', 'Account Update Failed.');
        }
        $request->session()->flash('success_message', 'Account Updated Successfully.');
        return redirect()->route('admin.account');
    }

    public function showAdminRequests()
    {
        $requests = Adminrequest::orderby('id', 'desc')
           ->where('status','=',1)
            ->paginate(6);
        return view('admin.adminrequests', ['requests' => $requests]);
    }

    public function approveRequest(Request $request,$id){
       $requests=Adminrequest::find($id);
        $when=Carbon::now()->addSeconds(10);
       $requests->notify((new ApproveRequestNotification)->delay($when));
       if($requests){
        Admin::create([
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'image'=>$request->get('image'),
            'user_name'=>$request->get('user_name'),
            'password'=>$request->get('password'),
        ]);
        $requests=Adminrequest::find($id);
        $requests->status=0;
        $requests->update([
            'status'=>$requests->status,
        ]);
       $requests->notify(new ApproveRequestNotification())->delay($when);
        $request->session()->flash('success_message','Admin Request Approved Successfully');
        return redirect()->route('admin.adminrequests');
        }
    }

    public function allRooms(){
        $rooms=Room::orderby('id','desc')->where('status','=','1')->where('availability','=','1')->paginate(10);
        return view('admin.allrooms',['rooms'=>$rooms]);
    }

    public function allBookedRooms(){
        $rooms=Room::orderby('id','desc')->where('status','=','1')->where('availability','=','0')->paginate(10);
        return view('admin.allbookedrooms',['rooms'=>$rooms]);
    }

    public function allBookingCancelledRooms(){
        $rooms=Bookroom::orderby('bookrooms.id','desc')
            ->join('rooms','rooms.id','=','bookrooms.room_id')
            ->select('rooms.*','bookrooms.status')
            ->where('bookrooms.status','=','0')
            ->paginate(10);
        return view('admin.allbookedrooms',['rooms'=>$rooms]);
    }

    public function allDeletedRooms(){
        $rooms=Room::orderby('id','desc')->where('status','=','0')->paginate(10);
        return view('admin.alldeletedrooms',['rooms'=>$rooms]);
    }

    public function allRoommates(){
        $roommates=Roommate::orderby('id','desc')->where('status','=','1')->where('availability','=','1')->paginate(10);
        return view('admin.allroommates',['roommates'=>$roommates]);
    }

    public function allAcceptedRoommates(){
        $roommates=Roommate::orderby('id','desc')->where('status','=','1')->where('availability','=','0')->paginate(10);
        return view('admin.allacceptedroommates',['roommates'=>$roommates]);
    }

    public function allCancelledAcceptedRequests(){
        $roommates=Acceptrequest::orderby('acceptrequests.id','desc')
            ->join('roommates','roommates.id','=','acceptrequests.roommate_id')
            ->select('roommates.*','acceptrequests.status')
            ->where('acceptrequests.status','=','0')
            ->paginate(10);
        return view('admin.allcancelledacceptedrequests',['roommates'=>$roommates]);
    }

    public function allDeletedRoommaterequests(){
        $roommates=Roommate::orderby('id','desc')->where('status','=','0')->paginate(10);
        return view('admin.alldeletedroommaterequests',['roommates'=>$roommates]);
    }

    public function allUsers(){
        $users=User::orderby('id','desc')->paginate(10);
        return view('admin.allusers',['users'=>$users]);
    }

    public function allOwners(){
        $users=Owner::orderby('id','desc')->paginate(10);
        return view('admin.allowners',['users'=>$users]);
    }

    public function allAdmins(){
        $users=Admin::orderby('id','desc')->paginate(10);
        return view('admin.alladmins',['users'=>$users]);
    }

    public function allAdminrequests(){
        $users=Adminrequest::orderby('id','desc')->paginate(10);
        return view('admin.alladminrequests',['users'=>$users]);
    }

    public function allApprovedAdminrequests(){
        $users=Adminrequest::orderby('id','desc')->where('status','=','0')->paginate(10);
        return view('admin.allapprovedadminrequests',['users'=>$users]);
    }

    public function allQuestions(){
        $questions=Question::orderby('id','desc')->where('status','=','1')->paginate(10);
        return view('admin.allquestions',['questions'=>$questions]);
    }

    public function allDeletedQuestions(){
        $questions=Question::orderby('id','desc')->where('status','=','0')->paginate(10);
        return view('admin.alldeletedquestions',['questions'=>$questions]);
    }

    public function allAnswers(){
        $answers=Answer::orderby('id','desc')->where('status','=','1')->paginate(10);
        return view('admin.allanswers',['answers'=>$answers]);
    }

    public function allDeletedAnswers(){
        $answers=Answer::orderby('id','desc')->where('status','=','0')->paginate(10);
        return view('admin.alldeletedanswers',['answers'=>$answers]);
    }

    public function allFeedbacks(){
        $feedbacks=Feedback::orderby('id','desc')->paginate(10);
        return view('admin.allfeedbacks',['feedbacks'=>$feedbacks]);
    }


}

