<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 02/02/2016
 * Time: 16:23
 */

namespace App\Http\Controllers;


use App\Repositories\StatusRepository;
use App\Repositories\UserRepository;
use App\Status;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $status;
    protected $user;

    public function __construct(StatusRepository $status, UserRepository $user)
    {
        $this->user = $user;
        $this->status = $status;
        $this->middleware('auth');
    }

    public function index(){
        $friends = $this->user->getFriends();
        $statuses = $this->status->getStatuses();
        return view('home', compact('statuses', 'friends', 'notifications'));
    }
}