<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Auth;
use App\Roommate;
use App\Feedback;
use App\Question;
use App\Answer;
use App\Owner;
use App\Http\Requests\FeedbackValidation;
use App\Http\Requests\AccountUpdateValidation;

class OwnerController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('owner.home');
    }

    public function showRoomRegisterForm()
    {
        return view('owner.addrooms');
    }

      public function showRoom(){
        $rooms=Room::orderBy('id','desc')->where('status','=','1')->where('availability','=','1')->paginate(4);
        return view('owner.rooms',['rooms'=>$rooms ]);
    }

     public function showMyRooms(){
        $rooms=Room::orderby('id','desc')
            ->where('added_by','=',Auth::user()->email)
            ->where('status','=','1')
            ->where('availability','=','1')->paginate(4);
        return view('owner.myrooms',['rooms'=>$rooms]);
    }

    public function editRoom($id){
        $room=Room::find($id);
        return view('owner.editrooms',compact('room'));
    }

    public function mineBookedRooms(){
        $rooms =Room::orderby('bookrooms.id','desc')
            ->join('bookrooms', 'rooms.id', '=', 'bookrooms.room_id')
            ->select('rooms.location as rl','rooms.no_of_rooms','bookrooms.*','rooms.owner_first_name as fn','rooms.owner_last_name as ln')
            ->where('rooms.added_by','=',Auth::user()->email)
            ->where('bookrooms.status','=',1)
            ->paginate(4);
        return view('owner.minebookedrooms',['rooms'=>$rooms]);
    }

    public function showRoommates(){
        $roommates=Roommate::orderBy('id','desc')
            ->where('status','=','1')
            ->where('availability','=','1')
            ->paginate(4);
        return view('owner.roommates',['roommates'=>$roommates ]);
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
        return view('owner.askquestion');
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
        return view('owner.forum',['questions'=>$questions ]);
    }

    public function replyAnswer($id){
        $question=Question::find($id);
        return view ('owner.replyanswer',compact('question'));
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

        return view('owner.answers',['answers'=>$answers,'questions'=>$questions]);
    }

    public function myQuestions(){
        $questions=Question::orderBy('id','desc')
            ->where('status','=','1')
            ->where('asked_by','=',Auth::user()->user_name)
            ->paginate(10);
        return view('owner.myquestions',['questions'=>$questions ]);
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

        return view('owner.myanswers',['answers'=>$answers]);
    }

    public function editQuestion($id){
        $question=Question::find($id);
        return view('owner.editquestion',compact('question'));
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
        return redirect()->route('owner.myquestions');
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

        return view('owner.editanswer',compact('answer','question'));
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
        return redirect()->route('owner.myanswers');
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
        return view('owner.aboutus');
    }

    public function account(){
        $user=Owner::find(Auth::user()->id);
        return view('owner.account',compact('user'));
    }

    public function accountUpdate(AccountUpdateValidation $request){
        $user=Owner::find(Auth::user()->id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName();
            $file->move('image/uploads/owners',$image);

            //remove old image
            if($user->image){
                unlink('image/uploads/owners/'.$user->image);
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
        return redirect()->route('owner.account');
    }
}

