<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 08/02/2016
 * Time: 12:12
 */

namespace App\Http\Controllers;


use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $notifications = Auth::user()->notifications()->whereRead(0)->get();
        return view('notifications', compact('notifications'));
    }

    public function readNotification(){
        $notification = Notification::whereId(Input::get('id'))->first();
        $notification->read = 1;
        $notification->save();
    }
}