<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 04/02/2016
 * Time: 10:17
 */

namespace App\Http\Controllers;


use App\Event;
use App\Http\Requests\CalendarRequest;
use App\Repositories\CalendarRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CalendarController extends Controller
{
    protected $calendar;

    public function __construct(CalendarRepository $calendar)
    {
        $this->calendar = $calendar;
        $this->middleware('auth');
    }

    public function index(){
        $events = Event::where('user_id', Auth::user()->id)->get();
        return view('calendar', compact('events'));
    }

    public function store(CalendarRequest $request){
        $user = Auth::user();
        $color = Input::get('color');
        $icon = Input::get('icon');
        $title = Input::get('title');
        $desc = Input::get('description');
        $date = Input::get('date');
        $this->calendar->newEvent($user);
        return response()->json(['color' => $color, 'desc' => $desc, 'icon' => $icon, 'date' => $date, 'title' => $title]);
    }
}