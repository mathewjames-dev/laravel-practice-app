<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 08/02/2016
 * Time: 15:36
 */

namespace App\Repositories;


use App\Message;
use App\Notification;
use App\Participant;
use App\Thread;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MessageRepository
{
    public function storeMessage($user, $input){
        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id' => Auth::user()->id,
                'body' => $input['message'],
            ]
        );
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id' => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id' => $user->id,
                'last_read' => new Carbon,
            ]
        );
        $this->sentMessageNotification($user);
    }

    public function sentMessageNotification($user){
        $sender = User::findOrFail(Auth::user()->id);
        $notification = new Notification();
        $notification->user_id = $user->id;
        $notification->title = 'You have a new message!!';
        $notification->body = $sender->name.' has sent you a private message! Go to your inbox to reply now!';
        $notification->save();
    }
}