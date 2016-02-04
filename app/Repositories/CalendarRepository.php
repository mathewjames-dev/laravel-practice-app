<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 04/02/2016
 * Time: 11:08
 */

namespace App\Repositories;


use App\Event;
use Illuminate\Support\Facades\Input;

class CalendarRepository
{
    public function newEvent($user){
        $event = new Event();
        $event->user_id = $user->id;
        $event->event_icon = Input::get('icon');
        $event->event_title = Input::get('title');
        $event->event_description = Input::get('description');
        $event->event_date = Input::get('date');
        $event->event_color = Input::get('color');
        $event->save();
    }
}