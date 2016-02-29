<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 08/02/2016
 * Time: 13:15
 */

namespace App\Http\Controllers;


use App\Events\MessageReply;
use App\Events\MessageSent;
use App\Message;
use App\Participant;
use App\Repositories\MessageRepository;
use App\Thread;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    protected $message;

    public function __construct(MessageRepository $message)
    {
        $this->message = $message;
        $this->middleware('auth');
    }

    public function index(){
        $currentUserId = Auth::user()->id;
        $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        return view('messages', compact('threads'));
    }

    public function sendMessage($id){
        $user = User::findOrFail($id);

        if($user->friends()->where('friend_id', '=', Auth::user()->id)->count() >= 1){
            return view('message-send', compact('user'));
        }else{
            return redirect('messages');
        }
    }

    public function store($id){
        $user = User::findOrFail($id);
        $input = Input::all();
        $this->message->storeMessage($user, $input);
        return redirect('messages');
    }

    public function show($id){
        try{
            $thread = Thread::findOrFail($id);
        }catch (ModelNotFoundException $e){
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        $thread->markAsRead(Auth::user()->id);
        return view('message-show', compact('thread', 'users'));
    }

    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        $message = Message::create(
            [
                'thread_id' => $thread->id,
                'user_id' => Auth::user()->id,
                'body' => Input::get('message'),
            ]
        );

        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id' => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        return redirect('/message/'.$id);
    }
}