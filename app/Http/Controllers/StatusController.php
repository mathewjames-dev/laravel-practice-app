<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 03/02/2016
 * Time: 14:05
 */

namespace App\Http\Controllers;


use App\Http\Requests\StatusRequest;
use App\Repositories\StatusRepository;
use App\Repositories\UserRepository;
use App\Status;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class StatusController extends Controller
{
    protected $status;

    public function __construct(StatusRepository $status)
    {
        $this->status = $status;
        $this->middleware('auth');
    }

    public function postStatus(StatusRequest $request)
    {
        if(Request::ajax()){
            $user = Auth::user();
            $status = Input::get('status');
            $this->status->postStatus($user);
            return $status;
        }
    }
}