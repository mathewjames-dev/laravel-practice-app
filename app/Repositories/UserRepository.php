<?php namespace App\Repositories;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 03/02/2016
 * Time: 14:22
 */
class UserRepository
{
    public function auth(){
        return Auth::user();
    }

    public function find($id){
        return User::findOrFail($id);
    }

    public function addConnection($id){
        $friend = $this->find($id);
        $this->auth()->addConnection($friend);
        $this->addConnectionNotification($friend);
    }

    public function addConnectionNotification($friend){
        $sender = User::findOrFail(Auth::user()->id);
        $notification = new Notification();
        $notification->user_id = $friend->id;
        $notification->title = 'Someone has added you as their connection!';
        $notification->body = $sender->name.' added you to their connection list, add them back to interact with them if you have not done so already!';
        $notification->save();
    }

    public function removeConnection($id){
        $friend = $this->find($id);
        $this->auth()->removeConnection($friend);
    }

    public function setChatStatus($input){
        Auth::user()->chat_status = $input;
        Auth::user()->save();
    }

    public function getNotifications(){
        return Auth::user()->notifications()->whereRead('0')->count();
    }

    public function getFriends(){
        return Auth::user()->friends;
    }
}